<?php

namespace Database\Seeders;

use App\Models\Armor;
use App\Models\ArmorSet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArmorSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the Armors table.
     *
     * @return void
     */
    public function run(): void
    {
        $prefix = "armors";

        $wellWornOutfit = ArmorSet::where("name", "Well-Worn Outfit")->first()->id;
        $hylianSet = ArmorSet::where("name", "Hylian Set")->first()->id;
        $soldiersSet = ArmorSet::where("name", "Soldier's Set")->first()->id;

        $armors = [
            [
                "name" => "Old Shirt",
                "image" => "{$prefix}/BotW_Old_Shirt_Icon.png",
                "upgradable" => 0,
                "armor_set_id" => $wellWornOutfit,
            ],
            [
                "name" => "Well-Worn Trousers",
                "image" => "{$prefix}/BotW_Well-Worn_Trousers_Icon.png",
                "upgradable" => 0,
                "armor_set_id" => $wellWornOutfit,
            ],
            [
                "name" => "Champion's Tunic",
                "image" => "{$prefix}/BotW_Champion's_Tunic_Icon.png",
            ],
            [
                "name" => "Hylian Hood",
                "image" => "{$prefix}/BotW_Hylian_Hood_Icon.png",
                "armor_set_id" => $hylianSet,
            ],
            [
                "name" => "Hylian Tunic",
                "image" => "{$prefix}/BotW_Hylian_Tunic_Icon.png",
                "armor_set_id" => $hylianSet,
            ],
            [
                "name" => "Hylian Trousers",
                "image" => "{$prefix}/BotW_Hylian_Trousers_Icon.png",
                "armor_set_id" => $hylianSet,
            ],
            [
                "name" => "Soldier's Helm",
                "image" => "{$prefix}/BotW_Soldier's_Helm_Icon.png",
                "armor_set_id" => $soldiersSet,
            ],
            [
                "name" => "Soldier's Armor",
                "image" => "{$prefix}/BotW_Soldier's_Armor_Icon.png",
                "armor_set_id" => $soldiersSet,
            ],
            [
                "name" => "Soldier's Greaves",
                "image" => "{$prefix}/BotW_Soldier's_Greaves_Icon.png",
                "armor_set_id" => $soldiersSet,
            ],
        ];

        foreach ($armors as $armor) {
            Armor::create($armor);
        }
    }
}
