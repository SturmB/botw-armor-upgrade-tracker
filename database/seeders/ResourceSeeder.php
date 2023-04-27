<?php

namespace Database\Seeders;

use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the Resources table.
     */
    public function run(): void
    {
        $prefix = "resources";

        $resources = [
            [
                "name" => "Voltfruit",
                "image" => "$prefix/BotW_Voltfruit_Icon.png",
            ],
            [
                "name" => "Sunshroom",
                "image" => "$prefix/BotW_Sunshroom_Icon.png",
            ],
            [
                "name" => "Zapshroom",
                "image" => "$prefix/BotW_Zapshroom_Icon.png",
            ],
            [
                "name" => "Warm Safflina",
                "image" => "$prefix/BotW_Warm_Safflina_Icon.png",
            ],
            [
                "name" => "Silent Princess",
                "image" => "$prefix/BotW_Silent_Princess_Icon.png",
            ],
            [
                "name" => "Star Fragment",
                "image" => "$prefix/BotW_Star_Fragment_Icon.png",
            ],
            [
                "name" => "Shard of Dinraal's Horn",
                "image" => "$prefix/BotW_Shard_of_Dinraal's_Horn_Icon.png",
            ],
            [
                "name" => "Shard of Naydra's Horn",
                "image" => "$prefix/BotW_Shard_of_Naydra's_Horn_Icon.png",
            ],
            [
                "name" => "Shard of Farosh's Horn",
                "image" => "$prefix/BotW_Shard_of_Farosh's_Horn_Icon.png",
            ],
            [
                "name" => "Smotherwing Butterfly",
                "image" => "$prefix/BotW_Fireproof_Lizard_Icon.png",
            ],
            [
                "name" => "Fireproof Lizard",
                "image" => "$prefix/BotW_Fireproof_Lizard_Icon.png",
            ],
            [
                "name" => "Flint",
                "image" => "$prefix/BotW_Flint_Icon.png",
            ],
            [
                "name" => "Amber",
                "image" => "$prefix/BotW_Amber_Icon.png",
            ],
            [
                "name" => "Topaz",
                "image" => "$prefix/BotW_Topaz_Icon.png",
            ],
            [
                "name" => "Ruby",
                "image" => "$prefix/BotW_Ruby_Icon.png",
            ],
            [
                "name" => "Sapphire",
                "image" => "$prefix/BotW_Sapphire_Icon.png",
            ],
            [
                "name" => "Bokoblin Horn",
                "image" => "$prefix/BotW_Bokoblin_Horn_Icon.png",
            ],
            [
                "name" => "Bokoblin Fang",
                "image" => "$prefix/BotW_Bokoblin_Fang_Icon.png",
            ],
            [
                "name" => "Bokoblin Guts",
                "image" => "$prefix/BotW_Bokoblin_Guts_Icon.png",
            ],
            [
                "name" => "Moblin Horn",
                "image" => "$prefix/BotW_Moblin_Horn_Icon.png",
            ],
            [
                "name" => "Moblin Fang",
                "image" => "$prefix/BotW_Moblin_Fang_Icon.png",
            ],
            [
                "name" => "Moblin Guts",
                "image" => "$prefix/BotW_Moblin_Guts_Icon.png",
            ],
            [
                "name" => "Lizalfos Tail",
                "image" => "$prefix/BotW_Lizalfos_Tail_Icon.png",
            ],
            [
                "name" => "Icy Lizalfos Tail",
                "image" => "$prefix/BotW_Icy_Lizalfos_Tail_Icon.png",
            ],
            [
                "name" => "Red Lizalfos Tail",
                "image" => "$prefix/BotW_Red_Lizalfos_Tail_Icon.png",
            ],
            [
                "name" => "Yellow Lizalfos Tail",
                "image" => "$prefix/BotW_Yellow_Lizalfos_Tail_Icon.png",
            ],
            [
                "name" => "Lynel Hoof",
                "image" => "$prefix/BotW_Lynel_Hoof_Icon.png",
            ],
            [
                "name" => "Lynel Guts",
                "image" => "$prefix/BotW_Lynel_Guts_Icon.png",
            ],
            [
                "name" => "Chuchu Jelly",
                "image" => "$prefix/BotW_Chuchu_Jelly_Icon.png",
            ],
            [
                "name" => "White Chuchu Jelly",
                "image" => "$prefix/BotW_White_Chuchu_Jelly_Icon.png",
            ],
            [
                "name" => "Red Chuchu Jelly",
                "image" => "$prefix/BotW_Red_Chuchu_Jelly_Icon.png",
            ],
            [
                "name" => "Yellow Chuchu Jelly",
                "image" => "$prefix/BotW_Yellow_Chuchu_Jelly_Icon.png",
            ],
            [
                "name" => "Keese Wing",
                "image" => "$prefix/BotW_Keese_Wing_Icon.png",
            ],
            [
                "name" => "Ice Keese Wing",
                "image" => "$prefix/BotW_Ice_Keese_Wing_Icon.png",
            ],
            [
                "name" => "Fire Keese Wing",
                "image" => "$prefix/BotW_Fire_Keese_Wing_Icon.png",
            ],
            [
                "name" => "Keese Eyeball",
                "image" => "$prefix/BotW_Keese_Eyeball_Icon.png",
            ],
            [
                "name" => "Hinox Guts",
                "image" => "$prefix/BotW_Hinox_Guts_Icon.png",
            ],
        ];

        foreach ($resources as $resource) {
            Resource::create($resource);
        }
    }
}
