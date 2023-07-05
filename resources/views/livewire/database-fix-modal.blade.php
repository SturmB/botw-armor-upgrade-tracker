<x-dialog-modal wire:model="showModal">
    <x-slot:title>
        <span class="text-botw-blue-500 font-bold">Database Updated</span>
    </x-slot:title>

    <x-slot:content>
        <p class="mb-2">Due to a configuration error, both armor tracker apps were sharing the same set of data. Since your last visit, this error has been corrected. In the process, your armor selections may have been affected.</p>
        <p>We apologize for the inconvenience and will make every effort to ensure that this does not happen again.</p>
    </x-slot:content>

    <x-slot:footer>
        <x-button wire:click="dismiss">Ok</x-button>
    </x-slot:footer>
</x-dialog-modal>
