<?php

namespace App\Services;

use App\Models\Requirement;
use App\Models\Track;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Collection;

class TrackingService
{
    private EloquentCollection $requirements;
    private Collection $formattedRequirements;

    public function __construct()
    {
        $this->requirements = Requirement::selectRaw(
            "armor_id, MIN(tier) AS minTier, MAX(tier) AS maxTier",
        )
            ->groupBy("armor_id")
            ->get();

        $this->formattedRequirements = $this->requirements->mapWithKeys(function (
            $requirement,
        ) {
            return [
                $requirement->armor_id => [
                    "tracking_tier_start" => $requirement->minTier,
                    "tracking_tier_end" => $requirement->maxTier,
                    "tracking" => true,
                ],
            ];
        });
    }

    public function getTrackingForArmor(int $armorId): array
    {
        $defaultValues = [
            "tracking_tier_start" => 1,
            "tracking_tier_end" => 4,
            "tracking" => true,
        ];

        if (auth()->check()) {
            $track = Track::where([
                "user_id" => auth()->id(),
                "armor_id" => $armorId,
            ])->first();
            return $track ? $track->toArray() : $defaultValues;
        }

        return session("armors.$armorId", $defaultValues);
    }

    public function getAllTracking(): array
    {
        if (auth()->check()) {
            return $this->formattedRequirements->all();
        }

        return session("armors", $this->formattedRequirements->toArray());
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

    private function populateTrackingDb(int $userId): void
    {
        $dbRequirements = $this->requirements->map(function (
            $requirement,
        ) use ($userId) {
            return [
                "user_id" => $userId,
                "armor_id" => $requirement->armor_id,
                "tracking" => true,
                "tracking_tier_start" => $requirement->minTier,
                "tracking_tier_end" => $requirement->maxTier,
            ];
        });
        Track::upsert(
            $dbRequirements->toArray(),
            ["user_id", "armor_id"],
            ["tracking", "tracking_tier_start", "tracking_tier_end"],
        );
    }

    private function populateTrackingSession(): void
    {
        session(["armors" => $this->formattedRequirements->toArray()]);
    }
}
