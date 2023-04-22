<?php

namespace App\Http\Livewire;

use App\Models\Armor;
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
        $armorAndTiers = session("armors.{$this->armor->id}", [
            "minTier" => 1,
            "maxTier" => 4,
            "isActive" => true,
        ]);
        $this->tierSliderOptions["start"] = [$armorAndTiers["minTier"], $armorAndTiers["maxTier"]];
        $this->range = [
            "min" => strval($armorAndTiers["minTier"]),
            "max" => strval($armorAndTiers["maxTier"]),
        ];
        $this->isActive = $armorAndTiers["isActive"];
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
