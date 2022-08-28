<div>
    @if ($list)
        @forelse($list as $item)
            <p>{{ $item["quantity"] }} of {{ $item["name"] }}</p>
        @empty
            <p>Empty Shopping List</p>
        @endforelse
    @endif
</div>
