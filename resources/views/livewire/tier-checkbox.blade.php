<div class="relative flex items-start">
    <div class="flex h-5 items-center">
        <input
            wire:model="checked"
            wire:click="checkboxClicked"
            id="{{ $uniqueId }}"
            aria-describedby="tier"
            name="{{ $uniqueId }}"
            type="checkbox"
            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
        >
    </div>
    <div class="ml-3 text-sm">
        <label for="{{ $uniqueId }}" class="font-medium text-gray-700">
            Tier {{ $tierNum }}
        </label>
    </div>
</div>
