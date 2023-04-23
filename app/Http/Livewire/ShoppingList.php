<?php

namespace App\Http\Livewire;

use App\Models\Requirement;
use App\Services\TrackingService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class ShoppingList extends Component
{
    public Collection $list;

    protected $listeners = ["updateShoppingList"];

    public function render(): View
    {
        return view("livewire.shopping-list");
    }

    public function mount(): void
    {
        $service = new TrackingService();
        $this->populateList($service->getAllTracking());
    }

    /**
     * The action to perform in this ShoppingList component
     * whenever a TierSlider component is changed.
     */
    public function updateShoppingList(
        array $armorAndTiers,
    ): void {
        // TODO: Update this to use TrackingService.
        $armorId = array_key_first($armorAndTiers);
        session(["armors.$armorId" => $armorAndTiers[$armorId]]);
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
                if (!$sessionArmors[$requirement->armor_id]["tracking"]) {
                    return false;
                }
                $tiers = range(
                    $sessionArmors[$requirement->armor_id]["tracking_tier_start"],
                    $sessionArmors[$requirement->armor_id]["tracking_tier_end"],
                );
                return in_array($requirement->tier, $tiers);
            })
            ->groupBy("resource_id")
            ->map(
                fn ($resources) => [
                    "resourceId" => $resources->first()->resource_id,
                    "quantity" => $resources->sum("quantity_needed"),
                ],
            );

        $this->list = collect($requirements);
    }
}
