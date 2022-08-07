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
                "name" => "Amber",
                "image" => "{$prefix}/BotW_Amber_Icon.png",
            ],
        ];

        foreach ($resources as $resource) {
            Resource::create($resource);
        }
    }
}
