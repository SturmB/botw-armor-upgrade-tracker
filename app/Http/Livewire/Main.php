<?php

namespace App\Http\Livewire;

use App\Models\ArmorSet;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Main extends Component
{
    public $armorSets;

    public function mount(): void
    {
        $this->armorSets = ArmorSet::with([
            "armors.resources" => function ($query) {
                $query->orderBy("tier", "asc");
            },
        ])->get();
    }

    public function render(): View
    {
        return view('livewire.main');
    }
}
