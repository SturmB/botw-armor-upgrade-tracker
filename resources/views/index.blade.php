<x-app-layout>
    <x-slot name="header">
        {{ __('Armor Upgrade Tracker') }}
    </x-slot>

    <div class="py-12">
        @foreach($armorSets as $armorSet)
            <div>
                <h2>{{ $armorSet->name }}</h2>
                @foreach($armorSet->armors as $armor)
                    <h3>{{ $armor->name }}</h3>
                    @if($armor->upgradable)
                        @foreach($armor->resources->groupBy(fn($resource) => $resource->pivot->tier) as $tierNum => $resources)
                            <p>Tier {{ $tierNum }}:</p>
                            <livewire:tier-checkbox
                                :armorName="$armor->name"
                                :requirementIds="$resources->pluck('pivot.id')"
                                :tierNum="$tierNum"
                                :wire:key="'checkbox-' . $armor->name . '-' . $tierNum"
                            />
                            <ul>
                                @foreach($resources as $resource)
                                    <li>{{ $resource->pivot->quantity_needed }} - {{ $resource->name }}</li>
                                @endforeach
                            </ul>
                        @endforeach
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</x-app-layout>
