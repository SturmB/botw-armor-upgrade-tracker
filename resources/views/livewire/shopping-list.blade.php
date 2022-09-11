<div>
    @if ($list)
        <ul>
            @forelse($list as $item)
                <x-shopping-list-item
                    :quantity="$item['quantity']"
                    :resourceId="$item['resourceId']"
                />
            @empty
                <p>Empty Shopping List</p>
            @endforelse
        </ul>
    @endif
</div>
