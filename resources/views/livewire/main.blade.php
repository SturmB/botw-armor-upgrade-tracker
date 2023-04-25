<div>
    <x-slot name="header">
        <div class="min-w-0 flex flex-1 justify-between">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
                {{ __('Armor Upgrade Tracker') }}
            </h2>
            <div>
                <div class="relative mt-2 flex items-center">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        name="search"
                        id="search"
                        class="block w-full rounded-md border-0 py-1.5 pl-10 pr-14 font-normal text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="{{ __('Quick search') }}"
                        wire:model="searchTerm"
                    >
                    <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                        <kbd class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">⌘K</kbd>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        @if($searchTerm)
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 mb-6">
                @foreach($filteredArmors as $armor)
                    <livewire:armor-card :armor="$armor" :wire:key="'search-' . $armor->id" />
                @endforeach
            </ul>
        @else
            @foreach($armorSets as $armorSet)
                <div>
                    @if($armorSet->armors->contains(fn ($armor) => $armor->upgradable))
                        <div class="border-b border-gray-200 pb-5 mb-5">
                            <h3 class="text-xl font-medium leading-6 text-gray-900">{{ $armorSet->name }}</h3>
                        </div>
                        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 mb-6">
                            @foreach($armorSet->armors as $armor)
                                <livewire:armor-card :armor="$armor" :wire:key="'main-' . $armor->id" />
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endforeach
        @endif
    </div>
</div>
