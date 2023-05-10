<li class="col-span-1 flex flex-col rounded-lg text-center shadow @if($isActive) bg-white dark:bg-gray-900 @else bg-gray-200 dark:bg-gray-700 @endif">
    @if($armor->upgradable)
        <x-checkbox class="absolute m-6 h-12 w-12 md:h-6 md:w-6 lg:h-10 lg:w-10" wire:model="isActive" wire:change="onChange" />
    @endif
    <div class="flex flex-1 flex-col p-8">
        <img class="mx-auto h-32 w-32 flex-shrink-0 @if(!$isActive) grayscale opacity-50 @endif" src="{{ asset("storage/images/$armor->image") }}" alt="">
        <h3 class="mt-6 text-2xl font-medium @if($isActive) text-gray-900 dark:text-gray-200 @else text-gray-400 dark:text-gray-500 @endif">{{ __($armor->name) }}</h3>
    </div>
    <div class="pb-8 px-4 border-t border-gray-200 dark:border-gray-600" @if(!$isActive) disabled @endif>
        @if($armor->upgradable)
            <x-range-slider class="m-6" :options="$tierSliderOptions" wire:model="range.min,range.max" wire:click="onChange" />
        @endif
    </div>
</li>
