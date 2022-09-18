<li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
    <div class="flex flex-1 flex-col p-8">
        <img class="mx-auto h-32 w-32 flex-shrink-0" src="{{ asset("storage/images/{$armor->image}") }}" alt="">
        <h3 class="mt-6 text-2xl font-medium text-gray-900">{{ $armor->name }}</h3>
        {{--<dl class="mt-1 flex flex-grow flex-col justify-between">
            <dt class="sr-only">Title</dt>
            <dd class="text-sm text-gray-500">Paradigm Representative</dd>
            <dt class="sr-only">Role</dt>
            <dd class="mt-3">
                <span class="rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-800">Admin</span>
            </dd>
        </dl>--}}
    </div>
    <div class="pb-8 px-4">
        @if($armor->upgradable)
            <livewire:tier-slider :armorId="$armor->id" />
        @endif
    </div>
</li>
