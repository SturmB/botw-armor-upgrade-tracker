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
     *
     * @return void
     */
    public function run(): void
    {
        $prefix = "resources";

        $resources = [
            [
                "name" => "Amber",
                "image" => "{$prefix}/BotW_Amber_Icon.png",
            ],
            [
                "name" => "Bokoblin Horn",
                "image" => "{$prefix}/BotW_Bokoblin_Horn_Icon.png",
            ],
            [
                "name" => "Bokoblin Fang",
                "image" => "{$prefix}/BotW_Bokoblin_Fang_Icon.png",
            ],
            [
                "name" => "Bokoblin Guts",
                "image" => "{$prefix}/BotW_Bokoblin_Guts_Icon.png",
            ],
            [
                "name" => "Moblin Guts",
                "image" => "{$prefix}/BotW_Moblin_Guts_Icon.png",
            ],
            [
                "name" => "Lizalfos Tail",
                "image" => "{$prefix}/BotW_Lizalfos_Tail_Icon.png",
            ],
            [
                "name" => "Lynel Hoof",
                "image" => "{$prefix}/BotW_Lynel_Hoof_Icon.png",
            ],
            [
                "name" => "Lynel Guts",
                "image" => "{$prefix}/BotW_Lynel_Guts_Icon.png",
            ],
            [
                "name" => "Chuchu Jelly",
                "image" => "{$prefix}/BotW_Chuchu_Jelly_Icon.png",
            ],
            [
                "name" => "Keese Wing",
                "image" => "{$prefix}/BotW_Keese_Wing_Icon.png",
            ],
            [
                "name" => "Keese Eyeball",
                "image" => "{$prefix}/BotW_Keese_Eyeball_Icon.png",
            ],
            [
                "name" => "Hinox Guts",
                "image" => "{$prefix}/BotW_Hinox_Guts_Icon.png",
            ],
        ];

        foreach ($resources as $resource) {
            Resource::create($resource);
        }
    }
}
