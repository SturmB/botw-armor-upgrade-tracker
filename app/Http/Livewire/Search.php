<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Search extends Component
{
    public string $searchTerm = "";

    public function render(): View
    {
        return view('livewire.search');
    }

    public function onChange(): void
    {
        $this->emit("searchArmors", $this->searchTerm);
    }
}
