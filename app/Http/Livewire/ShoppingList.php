<?php

namespace App\Http\Livewire;

use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Livewire\Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

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
//        $sessionArmors = $request->session()->get("armors", []);
//        $this->populateList($sessionArmors);
    }

    /**
     * The action to perform in this ShoppingList component
     * whenever a ResourceCheckbox component is clicked.
     *
     * @param bool $add Whether to add or subtract from the shopping list
     * @param array $requirementIds The IDs of the Requirements for getting the Resources and quantities needed
     */
    public function updateShoppingList(
        Request $request,
        array $armorAndTiers,
    ): void {
        $sessionArmors = session("armors", []);
//        if (Auth::check() && empty($sessionRequirements)) {
//            $sessionRequirements = Auth::user()->resources->pivot->pluck("id");
//        }

        $sessionArmors[$armorAndTiers["armorId"]] = [
            "minTier" => $armorAndTiers["minTier"],
            "maxTier" => $armorAndTiers["maxTier"],
        ];
//        if ($add) {
//            // If we're adding, add Requirement ID to session array if it doesn't exist.
//            $sessionRequirements = array_unique(
//                array_merge($sessionRequirements, $requirementIds),
//            );
//            sort($sessionRequirements);
//        } else {
//            // If we're subtracting, remove from session array if it exists.
//            $sessionRequirements = array_diff(
//                $sessionRequirements,
//                $requirementIds,
//            );
//        }
        session(["armors" => $sessionArmors]);

        $this->populateList($sessionArmors);
    }

    private function populateList(array $sessionArmors): void
    {
        $cases = '';
        $bindings = [];

//        foreach ($sessionArmors as $armorId => $tiers) {
//            $cases .= 'WHEN armor_id = ? AND tier BETWEEN ? AND ? THEN 1 ';
//            $bindings = [...$bindings, $armorId, $tiers['minTier'], $tiers['maxTier']];
//        }
//
//        $requirements = Requirement::whereArmorId(array_keys($sessionArmors))
//            ->selectRaw("resource_id, SUM(quantity_needed) AS quantity")
//            ->whereRaw("(CASE {$cases} ELSE 0 END) = 1", $bindings)
//            ->whereIn("armor_id", array_keys($sessionArmors))
//            ->groupBy("resource_id")
//            ->withCasts(["quantity" => "integer"])
//            ->get();

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

        // Then assign them to the $list.
        $this->list = collect($requirements);
//        foreach ($requirements as $requirement) {
//            $this->list->push($requirement);
//        }
    }
}
