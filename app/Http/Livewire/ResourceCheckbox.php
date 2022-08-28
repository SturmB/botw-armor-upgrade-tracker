<?php

namespace App\Http\Livewire;

use App\Models\Resource;
use Livewire\Component;

class ResourceCheckbox extends Component
{
    public bool $checked;
    public string $resourceName;
    public int $quantity;
    public int $pivotId;

    public function render()
    {
        return view("livewire.resource-checkbox");
    }

    public function mount()
    {
        $this->checked = false;
    }

    public function checkboxClicked()
    {
        $this->emit(
            "checkboxClicked",
            $this->checked,
//            $this->resource->id,
//            $this->quantity,
            $this->pivotId,
        );
    }
}
