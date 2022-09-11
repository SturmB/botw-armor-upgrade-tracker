<div>
    @if ($list)
        <ul>
            @foreach($list as $item)
                <li>{{ $item["quantity"] }} of {{ $item["name"] }}</li>
            @endforeach
        </ul>
    @else
        <p>Empty Shopping List</p>
    @endif
</div>
