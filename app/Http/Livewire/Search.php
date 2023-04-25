<?php

namespace App\Http\Livewire;

use Barryvdh\Debugbar\Facades\Debugbar;
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
        Debugbar::log("Search's searchTerm: ", $this->searchTerm);
        $this->emit("searchArmors", $this->searchTerm);
    }
}
