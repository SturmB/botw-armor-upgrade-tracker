<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class DatabaseFixModal extends Component
{
    public bool $showModal;

    public function render(): View
    {
        return view("livewire.database-fix-modal");
    }

    public function mount(): void
    {
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $this->showModal = Cache::rememberForever("modal:db-fix:$userId", fn () => true);
        }
    }

    public function dismiss(): void
    {
        $userId = auth()->user()->id;
        Cache::forever("modal:db-fix:$userId", $this->showModal = false);
    }
}
