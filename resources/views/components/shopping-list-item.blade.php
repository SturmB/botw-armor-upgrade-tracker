<li class="flex py-4">
    <img class="h-10 w-10" src="{{ asset("storage/images/{$resource->image}") }}" alt="">
    <div class="ml-3">
        <p class="text-sm font-medium text-gray-900">{{ $resource->name }}</p>
        <p class="text-sm text-gray-500">{{ $quantity }}</p>
    </div>
</li>
