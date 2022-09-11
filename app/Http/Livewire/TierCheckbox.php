<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class TierCheckbox extends Component
{
    public string $armorName = "";
    public bool $checked;
    public Collection $requirementIds;
    public int $tierNum = 1;
    public string $uniqueId;

    public function render()
    {
        return view("livewire.tier-checkbox");
    }

    public function mount(Request $request): void
    {
        $kebabArmor = Str::kebab($this->armorName);
        $this->uniqueId = "checkbox-{$kebabArmor}-{$this->tierNum}";

        $sessionChecked = $request->session()->get($this->uniqueId, false);
        $this->checked = $sessionChecked;
    }

    public function checkboxClicked(Request $request): void
    {
        $request->session()->put($this->uniqueId, $this->checked);

        $this->emit("checkboxClicked", $this->checked, $this->requirementIds);
    }
}
