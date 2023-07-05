<?php

namespace App\Http\Livewire;

use App\Models\BotwRequirement;
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

    public function mount(TrackingService $service): void
    {
        $this->updateShoppingList($service);
    }

    /**
     * The action to perform in this ShoppingList component
     * whenever an ArmorCard component is changed.
     */
    public function updateShoppingList(TrackingService $service): void
    {
        $trackingData = $service->getAllTracking();
        $requirements = BotwRequirement::with("resource")
            ->whereIn(
                "botw_armor_id",
                array_keys($trackingData),
            )
            ->get()
            ->filter(function ($requirement) use ($trackingData) {
                $trackingForThisArmor = $trackingData[$requirement->botw_armor_id];
                if (!$trackingForThisArmor["tracking"]) {
                    return false;
                }
                $tiers = range(
                    $trackingForThisArmor["tracking_tier_start"],
                    $trackingForThisArmor["tracking_tier_end"],
                );
                return in_array($requirement->tier, $tiers);
            })
            ->groupBy("botw_resource_id")
            ->map(
                fn ($requirement) => [
                    "resource" => $requirement->first()->resource,
                    "quantity" => $requirement->sum("quantity_needed"),
                ],
            );

        $this->list = $requirements;
    }
}
