<div>
    @if ($list)
        <ul>
            @forelse($list as $item)
                <x-shopping-list-item
                    :quantity="$item['quantity']"
                    :resource="$item['resource']"
                />
            @empty
                <div class="flex justify-center items-center gap-3 py-6 font-semibold text-lg text-gray-400 dark:text-gray-600">
                    <i class="fa-sharp fa-regular fa-clipboard-list fa-lg"></i>
                    <h3>{{ __("Empty Shopping List") }}</h3>
                </div>
            @endforelse
        </ul>
    @endif
</div>
