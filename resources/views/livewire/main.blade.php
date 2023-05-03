<div class="pb-12">
    @if($searchTerm)
        @if(!$filteredArmors->count())
            <div class="flex justify-center items-center gap-4 font-semibold text-2xl text-gray-400">
                <i class="fa-sharp fa-regular fa-circle-xmark fa-xl"></i>
                <h2>No Search Results</h2>
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
            <h2 class="text-2xl font-semibold text-gray-900">{{ __("Armor Sets") }}</h2>
            <div class="font-semibold text-xl">
                <a wire:click="setAllActive(true)"
                   class="text-botw-blue-500 hover:text-botw-blue-600 hover:cursor-pointer">Select All</a> / <a
                    wire:click="setAllActive(false)"
                    class="text-botw-blue-500 hover:text-botw-blue-600 hover:cursor-pointer">Deselect All</a>
            </div>
        </div>
        @foreach($armorSets as $armorSet)
            @if($armorSet->armors->contains(fn ($armor) => $armor->upgradable))
                <div>
                    <div class="border-b border-gray-200 pb-1 mb-5">
                        <h3 class="text-xl font-medium leading-6 text-gray-900">{{ __($armorSet->name) }}</h3>
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

        <h2 class="text-2xl font-semibold text-gray-900 py-6">{{ __("Uncategorized") }}</h2>

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
