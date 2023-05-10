<div class="pb-12">
    <div wire:loading.delay class="fixed inset-0 z-10 md:start-64 top-16 bg-gray-100/75 dark:bg-gray-800/90">
        <button
            class="block relative items-center mx-auto px-4 py-2 top-1/2 translate-y-[-50%] bg-botw-blue-500 dark:bg-botw-blue-400 border border-transparent rounded-md font-semibold text-xs text-white dark:text-botw-blue-900 uppercase tracking-widest transition"
            disabled
        >
            <i class="fa-duotone fa-loader fa-spin-pulse mr-2"></i>
            {{ __("Processing…") }}
        </button>
    </div>
    @if($searchTerm)
        @if(!$filteredArmors->count())
            <div class="flex justify-center items-center gap-4 font-semibold text-2xl text-gray-400 dark:text-gray-600">
                <i class="fa-sharp fa-regular fa-circle-xmark fa-xl"></i>
                <h2>{{ __("No Search Results") }}</h2>
            </div>
        @else
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-6">
                @foreach($filteredArmors as $armor)
                    <livewire:armor-card :armor="$armor" :tracking-data="$tracks->get($armor->id)"
                                         :wire:key="'search-' . $armor->id" />
                @endforeach
            </ul>
        @endif
    @else
        <div class="flex justify-between items-center py-6">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200">{{ __("Armor Sets") }}</h2>
            <div class="font-semibold text-xl">
                <a wire:click="setAllActive(true)"
                   class="text-botw-blue-500 dark:text-botw-blue-400 hover:text-botw-blue-600 dark:hover:text-botw-blue-300 hover:cursor-pointer hover:underline">{{ __("Select All") }}</a>
                / <a wire:click="setAllActive(false)"
                     class="text-botw-blue-500 dark:text-botw-blue-400 hover:text-botw-blue-600 dark:hover:text-botw-blue-300 hover:cursor-pointer hover:underline">{{ __("Deselect All") }}</a>
            </div>
        </div>
        @foreach($armorSets as $armorSet)
            @if($armorSet->armors->contains(fn ($armor) => $armor->upgradable))
                <div>
                    <div class="border-b border-gray-200 dark:border-gray-600 pb-1 mb-5">
                        <h3 class="text-xl font-medium leading-6 text-gray-900 dark:text-gray-200">{{ __($armorSet->name) }}</h3>
                    </div>
                    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-6">
                        @foreach($armorSet->armors as $armor)
                            <livewire:armor-card :armor="$armor" :tracking-data="$tracks->get($armor->id)"
                                                 :wire:key="'main-' . $armor->id" />
                        @endforeach
                    </ul>
                </div>
            @endif
        @endforeach

        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200 py-6">{{ __("Uncategorized") }}</h2>

        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-6">
            @foreach($uncategorizedArmors as $armor)
                @if($armor->upgradable)
                    <livewire:armor-card :armor="$armor" :tracking-data="$tracks->get($armor->id)"
                                         :wire:key="'main-' . $armor->id" />
                @endif
            @endforeach
        </ul>
    @endif
</div>
