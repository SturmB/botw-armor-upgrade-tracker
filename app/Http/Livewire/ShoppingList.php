<?php

namespace App\Http\Livewire;

use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Livewire\Component;

class ShoppingList extends Component
{
    public Collection $list;

    protected $listeners = ["updateShoppingList"];

    public function render()
    {
        return view("livewire.shopping-list");
    }

    public function mount(Request $request): void
    {
        $sessionArmors = $request->session()->get("armors", []);
        $this->populateList($sessionArmors);
    }

    /**
     * The action to perform in this ShoppingList component
     * whenever a ResourceCheckbox component is clicked.
     *
     * @param Request $request
     * @param array $armorAndTiers
     */
    public function updateShoppingList(
        Request $request,
        array $armorAndTiers,
    ): void {
        $sessionArmors = $request->session()->get("armors", []);
//        if (Auth::check() && empty($sessionRequirements)) {
//            $sessionRequirements = Auth::user()->resources->pivot->pluck("id");
//        }

        $sessionArmors[$armorAndTiers["armorId"]] = [
            "minTier" => $armorAndTiers["minTier"],
            "maxTier" => $armorAndTiers["maxTier"],
        ];
        $request->session()->put("armors", $sessionArmors);

        $this->populateList($sessionArmors);
    }

    private function populateList(array $sessionArmors): void
    {

        $requirements = Requirement::whereArmorId(array_keys($sessionArmors))
            ->get()
            ->filter(function ($requirement) use ($sessionArmors) {
                $tiers = range(
                    $sessionArmors[$requirement->armor_id]["minTier"],
                    $sessionArmors[$requirement->armor_id]["maxTier"]
                );
                return in_array($requirement->tier, $tiers);
            })
            ->groupBy("resource_id")
            ->map(
                fn($resources) => [
                    "resourceId" => $resources->first()->resource_id,
                    "quantity" => $resources->sum("quantity_needed"),
                ]
            );

        $this->list = collect($requirements);
    }
}
