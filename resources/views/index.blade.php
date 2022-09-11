<x-app-layout>
    <x-slot name="header">
        <div class="min-w-0 flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">{{ __('Armor Upgrade Tracker') }}</h2>
        </div>
    </x-slot>

    <div class="py-12">
        @foreach($armorSets as $armorSet)
            <div>
                @if($armorSet->armors->contains(fn ($armor) => $armor->upgradable))
                    <div class="border-b border-gray-200 pb-5 mb-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $armorSet->name }}</h3>
                    </div>
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
