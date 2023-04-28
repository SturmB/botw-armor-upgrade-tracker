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
                "name" => "Rushroom",
                "image" => "$prefix/BotW_Rushroom_Icon.png",
            ],
            [
                "name" => "Silent Shroom",
                "image" => "$prefix/BotW_Silent_Shroom_Icon.png",
            ],
            [
                "name" => "Swift Carrot",
                "image" => "$prefix/BotW_Swift_Carrot_Icon.png",
            ],
            [
                "name" => "Warm Safflina",
                "image" => "$prefix/BotW_Warm_Safflina_Icon.png",
            ],
            [
                "name" => "Swift Violet",
                "image" => "$prefix/BotW_Swift_Violet_Icon.png",
            ],
            [
                "name" => "Blue Nightshade",
                "image" => "$prefix/BotW_Blue_Nightshade_Icon.png",
            ],
            [
                "name" => "Silent Princess",
                "image" => "$prefix/BotW_Silent_Princess_Icon.png",
            ],
            [
                "name" => "Courser Bee Honey",
                "image" => "$prefix/BotW_Courser_Bee_Honey_Icon.png",
            ],
            [
                "name" => "Acorn",
                "image" => "$prefix/BotW_Acorn_Icon.png",
            ],
            [
                "name" => "Star Fragment",
                "image" => "$prefix/BotW_Star_Fragment_Icon.png",
            ],
            [
                "name" => "Dinraal's Scale",
                "image" => "$prefix/BotW_Dinraal's_Scale_Icon.png",
            ],
            [
                "name" => "Dinraal's Claw",
                "image" => "$prefix/BotW_Dinraal's_Claw_Icon.png",
            ],
            [
                "name" => "Shard of Dinraal's Fang",
                "image" => "$prefix/BotW_Shard_of_Dinraal's_Fang_Icon.png",
            ],
            [
                "name" => "Shard of Dinraal's Horn",
                "image" => "$prefix/BotW_Shard_of_Dinraal's_Horn_Icon.png",
            ],
            [
                "name" => "Naydra's Scale",
                "image" => "$prefix/BotW_Naydra's_Scale_Icon.png",
            ],
            [
                "name" => "Naydra's Claw",
                "image" => "$prefix/BotW_Naydra's_Claw_Icon.png",
            ],
            [
                "name" => "Shard of Naydra's Fang",
                "image" => "$prefix/BotW_Shard_of_Naydra's_Fang_Icon.png",
            ],
            [
                "name" => "Shard of Naydra's Horn",
                "image" => "$prefix/BotW_Shard_of_Naydra's_Horn_Icon.png",
            ],
            [
                "name" => "Farosh's Scale",
                "image" => "$prefix/BotW_Farosh's_Scale_Icon.png",
            ],
            [
                "name" => "Farosh's Claw",
                "image" => "$prefix/BotW_Farosh's_Claw_Icon.png",
            ],
            [
                "name" => "Shard of Farosh's Fang",
                "image" => "$prefix/BotW_Shard_of_Farosh's_Fang_Icon.png",
            ],
            [
                "name" => "Shard of Farosh's Horn",
                "image" => "$prefix/BotW_Shard_of_Farosh's_Horn_Icon.png",
            ],
            [
                "name" => "Hearty Bass",
                "image" => "$prefix/BotW_Hearty_Bass_Icon.png",
            ],
            [
                "name" => "Hyrule Bass",
                "image" => "$prefix/BotW_Hyrule_Bass_Icon.png",
            ],
            [
                "name" => "Stealthfin Trout",
                "image" => "$prefix/BotW_Stealthfin_Trout_Icon.png",
            ],
            [
                "name" => "Sneaky River Snail",
                "image" => "$prefix/BotW_Sneaky_River_Snail_Icon.png",
            ],
            [
                "name" => "Smotherwing Butterfly",
                "image" => "$prefix/BotW_Fireproof_Lizard_Icon.png",
            ],
            [
                "name" => "Energetic Rhino Beetle",
                "image" => "$prefix/BotW_Energetic_Rhino_Beetle_Icon.png",
            ],
            [
                "name" => "Sunset Firefly",
                "image" => "$prefix/BotW_Sunset_Firefly_Icon.png",
            ],
            [
                "name" => "Hot-Footed Frog",
                "image" => "$prefix/BotW_Hot-Footed_Frog_Icon.png",
            ],
            [
                "name" => "Hightail Lizard",
                "image" => "$prefix/BotW_Hightail_Lizard_Icon.png",
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
                "name" => "Opal",
                "image" => "$prefix/BotW_Opal_Icon.png",
            ],
            [
                "name" => "Luminous Stone",
                "image" => "$prefix/BotW_Luminous_Stone_Icon.png",
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
                "name" => "Diamond",
                "image" => "$prefix/BotW_Diamond_Icon.png",
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
                "name" => "Lizalfos Horn",
                "image" => "$prefix/BotW_Lizalfos_Horn_Icon.png",
            ],
            [
                "name" => "Lizalfos Talon",
                "image" => "$prefix/BotW_Lizalfos_Talon_Icon.png",
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
                "name" => "Lynel Horn",
                "image" => "$prefix/BotW_Lynel_Horn_Icon.png",
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
                "name" => "Electric Keese Wing",
                "image" => "$prefix/BotW_Electric_Keese_Wing_Icon.png",
            ],
            [
                "name" => "Keese Eyeball",
                "image" => "$prefix/BotW_Keese_Eyeball_Icon.png",
            ],
            [
                "name" => "Octorok Tentacle",
                "image" => "$prefix/BotW_Octorok_Tentacle_Icon.png",
            ],
            [
                "name" => "Octorok Eyeball",
                "image" => "$prefix/BotW_Octorok_Eyeball_Icon.png",
            ],
            [
                "name" => "Octo Balloon",
                "image" => "$prefix/BotW_Octo_Balloon_Icon.png",
            ],
            [
                "name" => "Molduga Fin",
                "image" => "$prefix/BotW_Molduga_Fin_Icon.png",
            ],
            [
                "name" => "Molduga Guts",
                "image" => "$prefix/BotW_Molduga_Guts_Icon.png",
            ],
            [
                "name" => "Hinox Toenail",
                "image" => "$prefix/BotW_Hinox_Toenail_Icon.png",
            ],
            [
                "name" => "Hinox Tooth",
                "image" => "$prefix/BotW_Hinox_Tooth_Icon.png",
            ],
            [
                "name" => "Hinox Guts",
                "image" => "$prefix/BotW_Hinox_Guts_Icon.png",
            ],
            [
                "name" => "Ancient Screw",
                "image" => "$prefix/BotW_Ancient_Screw_Icon.png",
            ],
            [
                "name" => "Ancient Spring",
                "image" => "$prefix/BotW_Ancient_Spring_Icon.png",
            ],
            [
                "name" => "Ancient Gear",
                "image" => "$prefix/BotW_Ancient_Gear_Icon.png",
            ],
            [
                "name" => "Ancient Shaft",
                "image" => "$prefix/BotW_Ancient_Shaft_Icon.png",
            ],
            [
                "name" => "Ancient Core",
                "image" => "$prefix/BotW_Ancient_Core_Icon.png",
            ],
            [
                "name" => "Giant Ancient Core",
                "image" => "$prefix/BotW_Giant_Ancient_Core_Icon.png",
            ],
        ];

        foreach ($resources as $resource) {
            Resource::create($resource);
        }
    }
}
