<?php

namespace App\Http\Livewire;

use App\Models\Armor;
use App\Models\ArmorSet;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class Main extends Component
{
    public string $searchTerm = "";
    public Collection $armorSets;
//    public Collection $filteredArmors;

    protected $listeners = ["searchArmors"];

    public function mount(): void
    {
        $this->armorSets = ArmorSet::with([
            "armors.resources" => function ($query) {
                $query->orderBy("tier", "asc");
            },
        ])->get();
//        $this->filteredArmors = collect();
    }

    public function render(): View
    {
        return view("livewire.main", [
            "filteredArmors" => Armor::where("name", "like", "%$this->searchTerm%")
                ->with([
                    "resources" => function ($query) {
                        $query->orderBy("tier", "asc");
                    },
                ])
                ->where("upgradable", true)
                ->get()
        ]);
    }

//    public function searchArmors(string $searchTerm): void
//    {
//        Debugbar::log("Main's searchTerm: ", $searchTerm);
//        if ($searchTerm) {
//            $this->filteredArmors = Armor::where("name", "like", "%$searchTerm%")
//                ->with([
//                    "resources" => function ($query) {
//                        $query->orderBy("tier", "asc");
//                    },
//                ])
//                ->where("upgradable", true)
//                ->get();
//        } else {
//            $this->filteredArmors = collect();
//        }
//    }
}
