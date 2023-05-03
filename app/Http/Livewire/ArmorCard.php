<?php

namespace App\Http\Livewire;

use App\Models\Armor;
use App\Services\TrackingService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ArmorCard extends Component
{
    public array $tierSliderOptions = [
        "start" => [1, 4],
        "step" => 1,
        "range" => [
            "min" => [1],
            "max" => [4],
        ],
        "connect" => true,
        "behaviour" => "tap-drag",
        "pips" => [
            "mode" => "values",
            "stepped" => true,
            "density" => 100,
            "values" => [1, 2, 3, 4],
        ],
    ];
    public Armor $armor;
    public array $range;
    public bool $isActive;
    public array|null $trackingData = null;

    protected $listeners = ["setActive"];

    public function render(): View
    {
        return view("livewire.armor-card");
    }

    public function mount(): void
    {
        if ($this->trackingData) {
            $this->tierSliderOptions["start"] = [
                $this->trackingData["tracking_tier_start"],
                $this->trackingData["tracking_tier_end"],
            ];
            $this->range = [
                "min" => strval($this->trackingData["tracking_tier_start"]),
                "max" => strval($this->trackingData["tracking_tier_end"]),
            ];
            $this->isActive = $this->trackingData["tracking"];
        }
    }

    public function onChange(TrackingService $service): void
    {
        $updatedTracking = collect([
            "armor_id" => $this->armor->id,
            "tracking_tier_start" => intval($this->range["min"]),
            "tracking_tier_end" => intval($this->range["max"]),
            "tracking" => $this->isActive,
        ]);

        $service->upsertTrackingForArmor($updatedTracking);

        $this->emit("updateShoppingList");
    }

    public function setActive(bool $active): void
    {
        $this->isActive = $active;
        $this->onChange(new TrackingService());
    }
}
