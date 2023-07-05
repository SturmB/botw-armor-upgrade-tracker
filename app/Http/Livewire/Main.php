<?php

namespace App\Http\Livewire;

use App\Models\BotwArmor;
use App\Models\BotwArmorSet;
use App\Services\TrackingService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Main extends Component
{
    public Collection $armorSets;
    public Collection $uncategorizedArmors;
    public Collection $filteredArmors;
    public string $searchTerm = "";
    public Collection $tracks;

    protected $listeners = ["searchArmors"];

    public function mount(TrackingService $service): void
    {
        $this->armorSets = Cache::rememberForever(
            "botw_armor_sets:all",
            fn () => BotwArmorSet::with([
                "armors.resources" => function ($query) {
                    $query->orderBy("tier", "asc");
                },
            ])->get()
        );
        $this->uncategorizedArmors = Cache::rememberForever(
            "botw_armors:uncategorized",
            fn () => BotwArmor::with([
                "resources" => function ($query) {
                    $query->orderBy("tier", "asc");
                },
            ])
                ->whereNull("botw_armor_set_id")
                ->get()
        );
        $this->filteredArmors = collect();
        $this->tracks = collect($service->getAllTracking());
    }

    public function render(): View
    {
        return view("livewire.main");
    }

    public function searchArmors(string $searchTerm): void
    {
        $this->searchTerm = $searchTerm;
        if ($searchTerm) {
            $this->filteredArmors = Cache::remember(
                "botw_armors:searches:$searchTerm",
                30 * 24 * 60 * 60,
                fn () => BotwArmor::where("name", "like", "%$searchTerm%")
                    ->with([
                        "resources" => function ($query) {
                            $query->orderBy("tier", "asc");
                        },
                    ])
                    ->where("upgradable", true)
                    ->get()
            );
        } else {
            $this->filteredArmors = collect();
        }
    }

    public function setAllActive(bool $active): void
    {
        $this->emit("setActive", $active);
    }
}
