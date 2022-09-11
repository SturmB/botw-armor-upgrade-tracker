<?php

namespace App\View\Components;

use App\Models\Resource;
use Illuminate\View\Component;

class ShoppingListItem extends Component
{
    public Resource $resource;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public int $quantity,
        private readonly int $resourceId,
    ) {
        $this->resource = Resource::findOrFail($this->resourceId);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view("components.shopping-list-item");
    }
}
