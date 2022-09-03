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
                            @foreach($resources as $resource)
                                <livewire:resource-checkbox
                                    :resourceName="$resource->name"
                                    :quantity="$resource->pivot->quantity_needed"
                                    :pivotId="$resource->pivot->id"
                                    :wire:key="'checkbox-' . $resource->pivot->id"
                                />
                            @endforeach
                        @endforeach
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</x-app-layout>
