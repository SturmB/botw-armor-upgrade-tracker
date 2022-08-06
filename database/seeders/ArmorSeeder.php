<?php

namespace Database\Seeders;

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

        DB::table("armors")->insert([
            [
                "name" => "Hylian Hood",
                "image" => "{$prefix}/BotW_Hylian_Hood_Icon.png",
            ],
        ]);
    }
}
