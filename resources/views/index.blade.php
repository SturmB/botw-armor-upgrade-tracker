<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Armor Upgrade Tracker</title>
</head>
<body>

<h1>Armor Sets</h1>

<div>
    @foreach($armorSets as $armorSet)
        <div>
            <h3>{{ $armorSet->name }}</h3>
            @forelse($armorSet->armors as $armor)
                <p>{{ $armor->name }}</p>
            @empty
                <p>No armors in the set.</p>
            @endforelse
        </div>
    @endforeach
</div>

</body>
</html>
