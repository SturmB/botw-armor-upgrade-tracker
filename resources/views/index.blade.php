<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Armor Upgrade Tracker</title>
    @livewireStyles
</head>
<body>

<h1>Armor Sets</h1>

<livewire:shopping-list />

<div>
    @foreach($armorSets as $armorSet)
        <div>
            <h2>{{ $armorSet->name }}</h2>
            @foreach($armorSet->armors as $armor)
                <h3>{{ $armor->name }}</h3>
                @if($armor->upgradable)
                    @foreach($armor->resources->groupBy(fn($resource) => $resource->pivot->tier) as $tierNum => $resources)
                        <p>Tier {{ $tierNum }}:</p>
                        @foreach($resources as $resource)
                            <livewire:resource-checkbox
                                :resourceName="$resource->name"
                                :quantity="$resource->pivot->quantity_needed"
                                :pivotId="$resource->pivot->id"
                                :wire:key="'checkbox-' . $resource->pivot->id"
                            />
                        @endforeach
                    @endforeach
                @endif
            @endforeach
        </div>
    @endforeach
</div>

@livewireScripts
</body>
</html>
