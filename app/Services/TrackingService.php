<?php

namespace App\Services;

use App\Models\BotwRequirement;
use App\Models\BotwTrack;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class TrackingService
{
    public function getTrackingForArmor(int $armorId): array
    {
        $defaultValues = [
            "botw_armor_id" => $armorId,
            "tracking_tier_start" => 1,
            "tracking_tier_end" => 4,
            "tracking" => true,
        ];

        if (auth()->check()) {
            $track = BotwTrack::where([
                "user_id" => auth()->id(),
                "botw_armor_id" => $armorId,
            ])->first();
            return $track?->toArray() ?: $defaultValues;
        }

        return session("botw_armors.$armorId", $defaultValues);
    }

    public function getAllTracking(): array
    {
        if (auth()->check()) {
            $userId = auth()->id();
            $trackingForUser = Cache::remember(
                "botw_tracking:user-$userId",
                24 * 60 * 60,
                fn () => BotwTrack::where([
                    "user_id" => $userId,
                ])->get()
            );

            return $trackingForUser?->count() > 0
                ? $trackingForUser->mapWithKeys(function ($track) {
                    return [
                        $track->botw_armor_id => $track,
                    ];
                })->toArray()
                : $this->formattedDefaults()->toArray();
        }

        return session("botw_armors", $this->formattedDefaults()->toArray());
    }

    /**
     * Called from middleware and used to populate the permanent DB entries
     * if this is the user's first time logging in.
     */
    public function populateTrackingDbIfEmpty(int $userId): void
    {
        if (BotwTrack::where("user_id", $userId)->count() === 0) {
            if (session()->has("botw_armors")) {
                $this->copyTrackingData($userId);
            } else {
                // This should never even fire, because even if this is your first time logging in,
                // you should _always_ already have session data to copy over.
                $this->populateTrackingDb($userId);
            }
        }
    }

    /**
     * Called from middleware and used if this is the user's first time visiting the site.
     */
    public function populateTrackingSessionIfEmpty(): void
    {
        if (session()->missing("botw_armors")) {
            session(["botw_armors" => $this->formattedDefaults()->toArray()]);
        }
    }

    public function upsertTrackingForArmor(Collection $newTracking): void
    {
        if (auth()->check()) {
            $userId = auth()->id();
            BotwTrack::updateOrCreate(
                ["user_id" => $userId, "botw_armor_id" => $newTracking["armor_id"]],
                [
                    "tracking" => $newTracking["tracking"],
                    "tracking_tier_start" => $newTracking["tracking_tier_start"],
                    "tracking_tier_end" => $newTracking["tracking_tier_end"],
                ],
            );
            Cache::forget("botw_tracking:user-$userId");
            $this->getAllTracking();
        } else {
            session(["botw_armors.{$newTracking->get('botw_armor_id')}" => $newTracking->toArray()]);
        }
    }

    private function trackingDefaults(): Collection
    {
        return Cache::rememberForever(
            'botw_tracking:defaults',
            fn () => BotwRequirement::selectRaw(
                "botw_armor_id, MIN(tier) AS tracking_tier_start, MAX(tier) AS tracking_tier_end, true AS tracking",
            )
                ->groupBy("botw_armor_id")
                ->get()
        );
    }

    private function formattedDefaults(): Collection
    {
        return Cache::rememberForever(
            'botw_tracking:formatted',
            fn () => $this->trackingDefaults()->mapWithKeys(function (
                $default,
            ) {
                return [
                    $default->botw_armor_id => $default,
                ];
            })
        );
    }

    /**
     * Populates the permanent DB tracking data for the user using defaults
     * instead of session data.
     * This ideally will never be called, because all users will have session data,
     * even if they've only visited the page once before logging in.
     */
    private function populateTrackingDb(int $userId): void
    {
        $dbRequirements = Cache::remember(
            "botw_tracking:user-$userId",
            24 * 60 * 60,
            fn () => $this->trackingDefaults()->toArray()
        );
        foreach ($dbRequirements as &$requirement) {
            $requirement["user_id"] = $userId;
        }
        BotwTrack::upsert(
            $dbRequirements,
            ["user_id", "botw_armor_id"],
            ["tracking", "tracking_tier_start", "tracking_tier_end"],
        );
    }

    /**
     * Copies over data from the session to the permanent DB tracking table.
     */
    private function copyTrackingData(int $userId): void
    {
        $sessionData = session("botw_armors", $this->formattedDefaults()->toArray());
        foreach ($sessionData as &$sessionDatum) {
            $sessionDatum["user_id"] = $userId;
        }
        BotwTrack::upsert(
            $sessionData,
            ["user_id", "botw_armor_id"],
            ["tracking", "tracking_tier_start", "tracking_tier_end"],
        );
    }
}
