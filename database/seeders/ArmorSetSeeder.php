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
            [
                "name" => "Zora Set",
                "image" => "$prefix/BotW_Link_Wearing_Zora_Set.jpg",
            ],
            [
                "name" => "Stealth Set",
                "image" => "$prefix/BotW_Link_Wearing_Stealth_Set.jpg",
            ],
            [
                "name" => "Climbing Set",
                "image" => "$prefix/BotW_Link_Wearing_Climbing_Set.jpg",
            ],
            [
                "name" => "Barbarian Set",
                "image" => "$prefix/BotW_Link_Wearing_Barbarian_Set.jpg",
            ],
            [
                "name" => "Fierce Deity Set",
            ],
            [
                "name" => "Radiant Set",
                "image" => "$prefix/BotW_Link_Wearing_Radiant_Set.jpg",
            ],
            [
                "name" => "Ancient Set",
                "image" => "$prefix/BotW_Link_Wearing_Ancient_Set.jpg",
            ],
            [
                "name" => "Dark Set",
                "image" => "$prefix/BotW_Link_Wearing_Dark_Series.jpg",
            ],
            [
                "name" => "Hero of Time Set",
            ],
            [
                "name" => "Hero of Winds Set",
            ],
            [
                "name" => "Hero of Twilight Set",
            ],
            [
                "name" => "Hero of the Sky Set",
            ],
            [
                "name" => "Hero Set",
            ],
            [
                "name" => "Hero of the Wild Set",
            ],
            [
                "name" => "Tingle's Set",
                "image" => "$prefix/BotW_Tingle%27s_Set_Concept_Artwork.png",
            ],
            [
                "name" => "Phantom Equipment",
            ],
            [
                "name" => "Royal Guard Set",
                "image" => "$prefix/BotW_Royal_Guard_Set_Concept_Artwork.png",
            ],
            [
                "name" => "Phantom Ganon Set",
            ],
            [
                "name" => "Salvager's Set",
            ],
        ];

        foreach ($armorSets as $armorSet) {
            ArmorSet::create($armorSet);
        }
    }
}
