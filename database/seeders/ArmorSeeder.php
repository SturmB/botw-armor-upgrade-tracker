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
     */
    public function run(): void
    {
        $prefix = "armors";

        $wellWornOutfit = ArmorSet::where("name", "Well-Worn Outfit")->first()
            ->id;
        $hylianSet = ArmorSet::where("name", "Hylian Set")->first()->id;
        $soldiersSet = ArmorSet::where("name", "Soldier's Set")->first()->id;
        $snowquillSet = ArmorSet::where("name", "Snowquill Set")->first()->id;
        $desertVoeSet = ArmorSet::where("name", "Desert Voe Set")->first()->id;
        $gerudoSet = ArmorSet::where("name", "Gerudo Set")->first()->id;

        $armors = [
            [
                "name" => "Old Shirt",
                "image" => "$prefix/BotW_Old_Shirt_Icon.png",
                "upgradable" => 0,
                "armor_set_id" => $wellWornOutfit,
            ],
            [
                "name" => "Well-Worn Trousers",
                "image" => "$prefix/BotW_Well-Worn_Trousers_Icon.png",
                "upgradable" => 0,
                "armor_set_id" => $wellWornOutfit,
            ],
            [
                "name" => "Champion's Tunic",
                "image" => "$prefix/BotW_Champion's_Tunic_Icon.png",
            ],
            [
                "name" => "Hylian Hood",
                "image" => "$prefix/BotW_Hylian_Hood_Icon.png",
                "armor_set_id" => $hylianSet,
            ],
            [
                "name" => "Hylian Tunic",
                "image" => "$prefix/BotW_Hylian_Tunic_Icon.png",
                "armor_set_id" => $hylianSet,
            ],
            [
                "name" => "Hylian Trousers",
                "image" => "$prefix/BotW_Hylian_Trousers_Icon.png",
                "armor_set_id" => $hylianSet,
            ],
            [
                "name" => "Soldier's Helm",
                "image" => "$prefix/BotW_Soldier's_Helm_Icon.png",
                "armor_set_id" => $soldiersSet,
            ],
            [
                "name" => "Soldier's Armor",
                "image" => "$prefix/BotW_Soldier's_Armor_Icon.png",
                "armor_set_id" => $soldiersSet,
            ],
            [
                "name" => "Soldier's Greaves",
                "image" => "$prefix/BotW_Soldier's_Greaves_Icon.png",
                "armor_set_id" => $soldiersSet,
            ],
            [
                "name" => "Amber Earrings",
                "image" => "$prefix/BotW_Amber_Earrings_Icon.png",
            ],
            [
                "name" => "Ruby Circlet",
                "image" => "$prefix/BotW_Ruby_Circlet_Icon.png",
            ],
            [
                "name" => "Snowquill Headdress",
                "image" => "$prefix/BotW_Snowquill_Headdress_Icon.png",
                "armor_set_id" => $snowquillSet,
            ],
            [
                "name" => "Snowquill Tunic",
                "image" => "$prefix/BotW_Snowquill_Tunic_Icon.png",
                "armor_set_id" => $snowquillSet,
            ],
            [
                "name" => "Snowquill Trousers",
                "image" => "$prefix/BotW_Snowquill_Trousers_Icon.png",
                "armor_set_id" => $snowquillSet,
            ],
            [
                "name" => "Sapphire Circlet",
                "image" => "$prefix/BotW_Sapphire_Circlet_Icon.png",
            ],
            [
                "name" => "Desert Voe Headband",
                "image" => "$prefix/BotW_Desert_Voe_Headband_Icon.png",
                "armor_set_id" => $desertVoeSet,
            ],
            [
                "name" => "Desert Voe Spaulder",
                "image" => "$prefix/BotW_Desert_Voe_Spaulder_Icon.png",
                "armor_set_id" => $desertVoeSet,
            ],
            [
                "name" => "Desert Voe Trousers",
                "image" => "$prefix/BotW_Desert_Voe_Trousers_Icon.png",
                "armor_set_id" => $desertVoeSet,
            ],
            [
                "name" => "Gerudo Veil",
                "image" => "$prefix/BotW_Gerudo_Veil_Icon.png",
                "upgradable" => 0,
                "armor_set_id" => $gerudoSet,
            ],
            [
                "name" => "Gerudo Top",
                "image" => "$prefix/BotW_Gerudo_Top_Icon.png",
                "upgradable" => 0,
                "armor_set_id" => $gerudoSet,
            ],
            [
                "name" => "Gerudo Sirwal",
                "image" => "$prefix/BotW_Gerudo_Sirwal_Icon.png",
                "upgradable" => 0,
                "armor_set_id" => $gerudoSet,
            ],
            [
                "name" => "Topaz Earrings",
                "image" => "$prefix/BotW_Topaz_Earrings_Icon.png",
            ],
        ];

        foreach ($armors as $armor) {
            Armor::create($armor);
        }
    }
}
