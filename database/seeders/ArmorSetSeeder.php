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
     *
     * @return void
     */
    public function run(): void
    {
        $prefix = "armor-sets";

        $armorSets = [
            [
                "name" => "Well-Worn Outfit",
                "image" => "{$prefix}/BotW_Link_Wearing_Well-Worn_Outfit.jpg",
            ],
            [
                "name" => "Hylian Set",
                "image" => "{$prefix}/BotW_Link_Wearing_Hylian_Armor.jpg",
            ],
            [
                "name" => "Soldier's Set",
                "image" => "{$prefix}/BotW_Link_Wearing_Soldier's_Set.jpg",
            ],
        ];

        foreach ($armorSets as $armorSet) {
            ArmorSet::create($armorSet);
        }
    }
}
