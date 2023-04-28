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
                    <livewire:armor-card :armor="$armor" :wire:key="'search-' . $armor->id" />
                @endforeach
            </ul>
        @endif
    @else
        <h2 class="text-2xl font-semibold text-gray-900 py-6">{{ __("Armor Sets") }}</h2>
        @foreach($armorSets as $armorSet)
            @if($armorSet->armors->contains(fn ($armor) => $armor->upgradable))
                <div>
                    <div class="border-b border-gray-200 pb-1 mb-5">
                        <h3 class="text-xl font-medium leading-6 text-gray-900">{{ $armorSet->name }}</h3>
                    </div>
                    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-6">
                        @foreach($armorSet->armors as $armor)
                            <livewire:armor-card :armor="$armor" :wire:key="'main-' . $armor->id" />
                        @endforeach
                    </ul>
                </div>
            @endif
        @endforeach

        <h2 class="text-2xl font-semibold text-gray-900 py-6">{{ __("Uncategorized") }}</h2>

        {{--<div class="border-b border-gray-200 pb-5 mb-5">
            <h3 class="text-xl font-medium leading-6 text-gray-900">{{ __("Uncategorized") }}</h3>
        </div>--}}
        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-6">
            @foreach($uncategorizedArmors as $armor)
                @if($armor->upgradable)
                    <livewire:armor-card :armor="$armor" :wire:key="'main-' . $armor->id" />
                @endif
            @endforeach
        </ul>
    @endif
</div>
