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

    public function mount()
    {
        $this->list = collect();
    }

    /**
     * The action to perform in this ShoppingList component
     * whenever a ResourceCheckbox component is clicked.
     *
     * @param bool $add Whether to add or subtract from the shopping list
     * @param int $requirementId The ID of the Requirement for getting the Resource and quantity needed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function checkboxClicked(bool $add, int $requirementId)
    {
        $sessionRequirements = session()->get("requirements", []);
//        if (Auth::check() && empty($sessionRequirements)) {
//            $sessionRequirements = Auth::user()->resources->pivot->pluck("id");
//        }

        // If we're adding, add Requirement ID to session array if it doesn't exist.
        if ($add && !in_array($requirementId, $sessionRequirements)) {
            $sessionRequirements[] = $requirementId;
            sort($sessionRequirements);
        }
        // If we're subtracting, remove from session array if it exists.
        if (!$add && in_array($requirementId, $sessionRequirements)) {
            array_splice(
                $sessionRequirements,
                array_search($requirementId, $sessionRequirements),
                1,
            );
        }
        session(["requirements" => $sessionRequirements]);

        // Load all Requirements with given $pivotId and eager load its Resources.
        $resources = Resource::whereHas("requirements", function ($query) use (
            $sessionRequirements,
        ) {
            $query->whereIn("id", $sessionRequirements);
        })
            ->withSum(
                [
                    "requirements" => function ($query2) use (
                        $sessionRequirements,
                    ) {
                        $query2->whereIn("id", $sessionRequirements);
                    },
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
