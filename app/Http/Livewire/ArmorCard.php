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

    public function render(): View
    {
        return view("livewire.armor-card");
    }

    public function mount(): void
    {
        $service = new TrackingService();
        $trackingData = $service->getTrackingForArmor($this->armor->id);
        $this->tierSliderOptions["start"] = [
            $trackingData["tracking_tier_start"],
            $trackingData["tracking_tier_end"],
        ];
        $this->range = [
            "min" => strval($trackingData["tracking_tier_start"]),
            "max" => strval($trackingData["tracking_tier_end"]),
        ];
        $this->isActive = $trackingData["tracking"];
    }


    public function onChange(): void
    {
        $this->emit("updateShoppingList", [
            $this->armor->id => [
                "minTier" => intval($this->range["min"]),
                "maxTier" => intval($this->range["max"]),
                "isActive" => $this->isActive,
            ],
        ]);
    }
}
