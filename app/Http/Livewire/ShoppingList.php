<?php

namespace App\Http\Livewire;

use App\Models\Requirement;
use App\Models\Resource;
use Illuminate\Support\Collection;
use Livewire\Component;

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

    public function checkboxClicked(
        bool $add,
//        Resource $resource,
//        int $quantity,
        int $pivotId,
    ) {
        $requirement = Requirement::findOrFail($pivotId);
        $quantity = $requirement->quantity_needed;
        $resource = $requirement->resource;

        $this->list->push([
            "name" => $resource->name,
            "quantity" => $quantity,
        ]);


        // If we're adding, add Requirement ID to session array if it doesn't exist.
        // If we're subtracting, remove from session array if it exists.

        // Load all Requirements with given $pivotId and eager load its Resources.
        // Then assign them to the $list.

        // Check if "Name" already exists in the session/db.
//        if (session()->exists($resource->name)) {
//            // If so, add/subtract "Quantity" from it. Then filter out any quantity 0 items. Then save to session/db.
//            if ($add) {
//                session([$resource->name => session($resource->name) + $quantity]);
//            } else {
//                session([$resource->name => session($resource->name) - $quantity]);
//                if (session($resource->name) === 0) {
//                    session()->forget($resource->name);
//                }
//            }
//        } else {
//            // If not, add it to the session/db.
//            if ($add) {
//                session([$resource->name => $quantity]);
//            }
//        }
//        // In both cases, save new info to session/db.
//
//        $this->list = collect();
//        foreach (session()->all() as $key => $item) {
//            if (!str_starts_with($key, "_")) {
//                $this->list->push([
//                    "name" => $key,
//                    "quantity" => $item,
//                ]);
//            }
//        }
    }
}
