<div class="py-12">
    @foreach($armorSets as $armorSet)
        <div>
            @if($armorSet->armors->contains(fn ($armor) => $armor->upgradable))
                <div class="border-b border-gray-200 pb-5 mb-5">
                    <h3 class="text-xl font-medium leading-6 text-gray-900">{{ $armorSet->name }}</h3>
                </div>
                <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 mb-6">
                    @foreach($armorSet->armors as $armor)
                        <livewire:armor-card :armor="$armor" />
                    @endforeach
                </ul>
            @endif
        </div>
    @endforeach
</div>
