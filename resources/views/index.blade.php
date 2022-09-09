<x-app-layout>
    <x-slot name="header">
        {{ __('Armor Upgrade Tracker') }}
    </x-slot>

    <div class="py-12">
        @foreach($armorSets as $armorSet)
            <div>
                @if($armorSet->armors->contains(fn ($armor) => $armor->upgradable))
                    <h2>{{ $armorSet->name }}</h2>
                    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach($armorSet->armors as $armor)
                            <x-armor-card :armor="$armor" />
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
