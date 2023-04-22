<li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
    @if($armor->upgradable)
        <x-jet-checkbox class="absolute m-6 h-12 w-12" wire:model="isActive" />
    @endif
    <div class="flex flex-1 flex-col p-8">
        <img class="mx-auto h-32 w-32 flex-shrink-0" src="{{ asset("storage/images/{$armor->image}") }}" alt="">
        <h3 class="mt-6 text-2xl font-medium text-gray-900">{{ $armor->name }}</h3>
    </div>
    <div class="pb-8 px-4">
        @if($armor->upgradable)
            <x-range-slider class="m-6" :options="$options" wire:model="range.min,range.max" wire:click="onChange" />
        @endif
    </div>
</li>
