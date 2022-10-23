<?php

namespace App\Http\Livewire;

use App\Models\Requirement;
use App\Services\ArmorService;
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

    public function mount(): void
    {
        if (session()->missing("armors")) {
            $requirements = Requirement::selectRaw(
                "armor_id, MIN(tier) AS minTier, MAX(tier) AS maxTier",
            )
                ->groupBy("armor_id")
                ->get()
                ->mapWithKeys(function ($item) {
                    return [
                        $item->armor_id => [
                            "minTier" => $item->minTier,
                            "maxTier" => $item->maxTier,
                        ],
                    ];
                });
            session(["armors" => $requirements->toArray()]);
            $this->populateList($requirements->all());
        } else {
            $sessionArmors = session("armors", []);
            $this->populateList($sessionArmors);
        }
    }

    /**
     * The action to perform in this ShoppingList component
     * whenever a TierSlider component is changed.
     *
     * @param array $armorAndTiers
     */
    public function updateShoppingList(
        array $armorAndTiers,
    ): void {
        $armorId = array_key_first($armorAndTiers);
        session(["armors.{$armorId}" => $armorAndTiers[$armorId]]);
        $this->populateList(session("armors"));
    }

    private function populateList(array $sessionArmors): void
    {
        $requirements = Requirement::whereIn(
            "armor_id",
            array_keys($sessionArmors),
        )
            ->get()
            ->filter(function ($requirement) use ($sessionArmors) {
                $tiers = range(
                    $sessionArmors[$requirement->armor_id]["minTier"],
                    $sessionArmors[$requirement->armor_id]["maxTier"],
                );
                return in_array($requirement->tier, $tiers);
            })
            ->groupBy("resource_id")
            ->map(
                fn($resources) => [
                    "resourceId" => $resources->first()->resource_id,
                    "quantity" => $resources->sum("quantity_needed"),
                ],
            );

        $this->list = collect($requirements);
    }
}
