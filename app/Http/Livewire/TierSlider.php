<?php

namespace App\Http\Livewire;

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
    public array $range = [
        "min" => "1",
        "max" => "4",
    ];
    public int $armorId;

    public function render()
    {
        return view("livewire.tier-slider");
    }

    public function onChange()
    {
        $this->emit("updateShoppingList", [
            "armorId" => $this->armorId,
            "minTier" => intval($this->range["min"]),
            "maxTier" => intval($this->range["max"]),
        ]);
    }
}
