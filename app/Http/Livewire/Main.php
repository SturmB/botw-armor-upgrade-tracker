<?php

namespace App\Http\Livewire;

use App\Models\Armor;
use App\Models\ArmorSet;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class Main extends Component
{
    public Collection $armorSets;
    public Collection $uncategorizedArmors;
    public Collection $filteredArmors;
    public string $searchTerm = "";

    protected $listeners = ["searchArmors"];

    public function mount(): void
    {
        $this->armorSets = ArmorSet::with([
            "armors.resources" => function ($query) {
                $query->orderBy("tier", "asc");
            },
        ])->get();
        $this->uncategorizedArmors = Armor::with([
            "resources" => function ($query) {
                $query->orderBy("tier", "asc");
            },
        ])
            ->whereNull("armor_set_id")
            ->get();
        $this->filteredArmors = collect();
    }

    public function render(): View
    {
        return view("livewire.main");
    }

    public function searchArmors(string $searchTerm): void
    {
        $this->searchTerm = $searchTerm;
        if ($searchTerm) {
            $this->filteredArmors = Armor::where("name", "like", "%$searchTerm%")
                ->with([
                    "resources" => function ($query) {
                        $query->orderBy("tier", "asc");
                    },
                ])
                ->where("upgradable", true)
                ->get();
        } else {
            $this->filteredArmors = collect();
        }
    }
}
