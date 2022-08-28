<x-jet-label for="checkbox-{{ $pivotId }}">
    <x-jet-checkbox wire:model="checked" wire:click="checkboxClicked" name="checkbox-{{ $pivotId }}" />
    {{ $quantity }} {{ $resourceName }}
</x-jet-label>
