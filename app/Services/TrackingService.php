<?php

namespace App\Services;

use App\Models\Requirement;
use App\Models\Track;
use Illuminate\Support\Collection;

class TrackingService
{
    private Collection $trackingDefaults;
    private Collection $formattedDefaults;

    public function __construct()
    {
        $this->trackingDefaults = Requirement::selectRaw(
            "armor_id, MIN(tier) AS tracking_tier_start, MAX(tier) AS tracking_tier_end, true AS tracking",
        )
            ->groupBy("armor_id")
            ->get();

        $this->formattedDefaults = $this->trackingDefaults->mapWithKeys(function (
            $default,
        ) {
            return [
                $default->armor_id => $default,
            ];
        });
    }

    public function getTrackingForArmor(int $armorId): array
    {
        $defaultValues = [
            "armor_id" => $armorId,
            "tracking_tier_start" => 1,
            "tracking_tier_end" => 4,
            "tracking" => true,
        ];

        if (auth()->check()) {
            $track = Track::where([
                "user_id" => auth()->id(),
                "armor_id" => $armorId,
            ])->first();
            return $track?->toArray() ?: $defaultValues;
        }

        return session("armors.$armorId", $defaultValues);
    }

    public function getAllTracking(): array
    {
        if (auth()->check()) {
            $trackingForUser = Track::where([
                "user_id" => auth()->id(),
            ])->get();

            return $trackingForUser?->count() > 0
                ? $trackingForUser->mapWithKeys(function ($track) {
                    return [
                        $track->armor_id => $track,
                    ];
                })->toArray()
                : $this->formattedDefaults->toArray();
        }

        return session("armors", $this->formattedDefaults->toArray());
    }

    public function populateTrackingDbIfEmpty(int $userId): void
    {
        // TODO: Copy over session data, if it exists, rather than starting DB entries from scratch.
        if (Track::where("user_id", $userId)->count() === 0) {
            $this->populateTrackingDb($userId);
        }
    }

    public function populateTrackingSessionIfEmpty(): void
    {
        if (session()->missing("armors")) {
            $this->populateTrackingSession();
        }
    }

    public function upsertTrackingForArmor(Collection $newTracking): void
    {
        if (auth()->check()) {
            $userId = auth()->user()->id;
            Track::updateOrCreate(
                ["user_id" => $userId, "armor_id" => $newTracking["armor_id"]],
                [
                    "tracking" => $newTracking["tracking"],
                    "tracking_tier_start" => $newTracking["tracking_tier_start"],
                    "tracking_tier_end" => $newTracking["tracking_tier_end"],
                ],
            );
        } else {
            session(["armors.{$newTracking->get('armor_id')}" => $newTracking->toArray()]);
        }
    }

    private function populateTrackingDb(int $userId): void
    {
        $dbRequirements = $this->trackingDefaults->toArray();
        foreach ($dbRequirements as &$requirement) {
            $requirement["user_id"] = $userId;
        }
        Track::upsert(
            $dbRequirements,
            ["user_id", "armor_id"],
            ["tracking", "tracking_tier_start", "tracking_tier_end"],
        );
    }

    private function populateTrackingSession(): void
    {
        session(["armors" => $this->formattedDefaults->toArray()]);
    }
}
