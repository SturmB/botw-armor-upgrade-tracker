<?php

namespace App\View\Components;

use App\Models\Resource;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShoppingListItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $quantity,
        public Resource $resource,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view("components.shopping-list-item");
    }
}
