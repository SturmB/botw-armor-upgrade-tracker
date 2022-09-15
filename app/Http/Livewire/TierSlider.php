<?php

namespace App\Http\Livewire;

use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class TierSlider extends Component
{
    public array $options = [
        "start" => [0, 4],
        "step" => 1,
        "range" => [
            "min" => [0],
            "max" => [4],
        ],
        "connect" => true,
        "behaviour" => "tap-drag",
        "pips" => [
            "mode" => "values",
            "stepped" => true,
            "density" => 100,
            "values" => [0, 1, 2, 3, 4],
        ],
    ];

    public array $range = [
        "min" => "0",
        "max" => "4",
    ];

    public function render()
    {
        return view("livewire.tier-slider");
    }

    public function onChange()
    {
        Debugbar::info($this->range);
    }
}
