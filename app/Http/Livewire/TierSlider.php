<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class TierSlider extends Component
{
    public array $options = [
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
    public array $range;
    public int $armorId;

    public function render()
    {
        return view("livewire.tier-slider");
    }

    public function mount()
    {
        $armorAndTiers = session("armors.{$this->armorId}", [
            "minTier" => 1,
            "maxTier" => 4,
        ]);
        $this->options["start"] = array_values($armorAndTiers);
        $this->range = [
            "min" => strval($armorAndTiers["minTier"]),
            "max" => strval($armorAndTiers["maxTier"]),
        ];
    }

    public function onChange()
    {
        $this->emit("updateShoppingList", [
            $this->armorId => [
                "minTier" => intval($this->range["min"]),
                "maxTier" => intval($this->range["max"]),
            ],
        ]);
    }
}
