<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

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

    public function mount()
    {
        $this->checked = false;
        $kebabArmor = Str::kebab($this->armorName);
        $this->uniqueId = "checkbox-{$kebabArmor}-{$this->tierNum}";
    }

    public function checkboxClicked()
    {
        $this->emit(
            "checkboxClicked",
            $this->checked,
            $this->requirementIds
        );
    }
}
