<?php

namespace Database\Seeders;

use App\Models\ArmorSet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArmorSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the Armor table.
     *
     * @return void
     */
    public function run()
    {
        $prefix = "armors";

        $hylianSet = ArmorSet::where("name", "Hylian Set")->first()->id;
        $soldiersSet = ArmorSet::where("name", "Soldier's Set")->first()->id;

        DB::table("armors")->insert([
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
                "name" => "Hylian Hood",
                "image" => "{$prefix}/BotW_Soldier's_Helm_Icon.png",
                "armor_set_id" => $soldiersSet,
            ],
            [
                "name" => "Hylian Tunic",
                "image" => "{$prefix}/BotW_Soldier's_Armor_Icon.png",
                "armor_set_id" => $soldiersSet,
            ],
            [
                "name" => "Hylian Trousers",
                "image" => "{$prefix}/BotW_Soldier's_Greaves_Icon.png",
                "armor_set_id" => $soldiersSet,
            ],
        ]);
    }
}
