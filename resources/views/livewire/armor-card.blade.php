<li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg text-center shadow @if($isActive) bg-white @else bg-gray-200 @endif">
    @if($armor->upgradable)
        <input type="checkbox" class="absolute m-6 h-12 w-12 rounded border-gray-300 text-botw-blue-500 shadow-sm focus:border-botw-blue-300 focus:ring focus:ring-botw-blue-200 focus:ring-opacity-50" wire:model="isActive" wire:change="onChange" />
    @endif
    <div class="flex flex-1 flex-col p-8">
        <img class="mx-auto h-32 w-32 flex-shrink-0 @if(!$isActive) grayscale opacity-50 @endif" src="{{ asset("storage/images/{$armor->image}") }}" alt="">
        <h3 class="mt-6 text-2xl font-medium @if($isActive) text-gray-900 @else text-gray-400 @endif">{{ $armor->name }}</h3>
    </div>
    <div class="pb-8 px-4" @if(!$isActive) disabled @endif>
        @if($armor->upgradable)
            <x-range-slider class="m-6" :options="$tierSliderOptions" wire:model="range.min,range.max" wire:click="onChange" />
        @endif
    </div>
</li>
