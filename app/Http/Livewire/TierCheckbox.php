<?php

namespace App\Http\Livewire;

use Barryvdh\Debugbar\Facades\Debugbar;
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

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function mount()
    {
        $kebabArmor = Str::kebab($this->armorName);
        $this->uniqueId = "checkbox-{$kebabArmor}-{$this->tierNum}";

        $sessionChecked = session()->get($this->uniqueId, false);
        Debugbar::info($sessionChecked);
        $this->checked = $sessionChecked;
    }

    public function checkboxClicked()
    {
        session([$this->uniqueId => $this->checked]);

        $this->emit(
            "checkboxClicked",
            $this->checked,
            $this->requirementIds
        );
    }
}
