<?php

namespace App\Http\Livewire;

use App\Models\Requirement;
use App\Models\Resource;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ShoppingList extends Component
{
    public Collection $list;

    protected $listeners = ["checkboxClicked"];

    public function render()
    {
        return view("livewire.shopping-list");
    }

    /**
     * The action to perform in this ShoppingList component
     * whenever a ResourceCheckbox component is clicked.
     *
     * @param bool $add Whether to add or subtract from the shopping list
     * @param array $requirementIds The IDs of the Requirements for getting the Resources and quantities needed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function checkboxClicked(bool $add, array $requirementIds)
    {
        $sessionRequirements = session()->get("requirements", []);
        //        if (Auth::check() && empty($sessionRequirements)) {
        //            $sessionRequirements = Auth::user()->resources->pivot->pluck("id");
        //        }

        if ($add) {
            // If we're adding, add Requirement ID to session array if it doesn't exist.
            $sessionRequirements = array_unique(
                array_merge($sessionRequirements, $requirementIds),
            );
            sort($sessionRequirements);
        } else {
            // If we're subtracting, remove from session array if it exists.
            $sessionRequirements = array_diff($sessionRequirements, $requirementIds);
        }
        session(["requirements" => $sessionRequirements]);

        // Load all Requirements with given $pivotId and eager load its Resources.
        $resources = Resource::whereHas(
            "requirements",
            fn($query) => $query->whereKey($sessionRequirements),
        )
            ->withSum(
                [
                    "requirements" => fn($query2) => $query2->whereKey(
                        $sessionRequirements,
                    ),
                ],
                "quantity_needed",
            )
            ->get();

        // Then assign them to the $list.
        $this->list = collect();
        foreach ($resources as $resource) {
            $this->list->push([
                "name" => $resource->name,
                "quantity" => $resource->requirements_sum_quantity_needed,
            ]);
        }
    }
}
