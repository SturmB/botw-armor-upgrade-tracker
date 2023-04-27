<?php

namespace Database\Seeders;

use App\Models\ArmorSet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArmorSetSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the Armor Sets table.
     */
    public function run(): void
    {
        $prefix = "armor-sets";

        $armorSets = [
            [
                "name" => "Well-Worn Outfit",
                "image" => "$prefix/BotW_Link_Wearing_Well-Worn_Outfit.jpg",
            ],
            [
                "name" => "Hylian Set",
                "image" => "$prefix/BotW_Link_Wearing_Hylian_Armor.jpg",
            ],
            [
                "name" => "Soldier's Set",
                "image" => "$prefix/BotW_Link_Wearing_Soldier's_Set.jpg",
            ],
            [
                "name" => "Snowquill Set",
                "image" => "$prefix/BotW_Link_Wearing_Snowquill_Set.jpg",
            ],
            [
                "name" => "Desert Voe Set",
                "image" => "$prefix/BotW_Link_Wearing_Desert_Voe_Set.jpg",
            ],
            [
                "name" => "Gerudo Set",
                "image" => "$prefix/BotW_Link_Wearing_Gerudo_Set.jpg",
            ],
            [
                "name" => "Rubber Set",
                "image" => "$prefix/BotW_Link_Wearing_Rubber_Armor.jpg",
            ],
            [
                "name" => "Flamebreaker Set",
                "image" => "$prefix/BotW_Link_Wearing_Flamebreaker_Set.jpg",
            ],
        ];

        foreach ($armorSets as $armorSet) {
            ArmorSet::create($armorSet);
        }
    }
}
