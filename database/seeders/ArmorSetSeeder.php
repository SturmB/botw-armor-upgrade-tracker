<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArmorSetSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the Armor Sets table.
     *
     * @return void
     */
    public function run()
    {
        $prefix = "armor-sets";

        DB::table("armor_sets")->insert([
            [
                "name" => "Hylian Set",
                "image" => "{$prefix}/BotW_Link_Wearing_Hylian_Armor.jpg",
            ],
            [
                "name" => "Soldier's Set",
                "image" => "{$prefix}/BotW_Link_Wearing_Soldier's_Set.jpg"
            ]
        ]);
    }
}
