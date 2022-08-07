<?php

namespace Database\Seeders;

use App\Models\Armor;
use App\Models\Resource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ArmorResourceSeeder extends Seeder
{
    use WithoutModelEvents;

    private int $bokoblinHorn, $bokoblinFang, $bokoblinGuts, $amber;

    /**
     * Seed the Armor-Resource pivot table.
     *
     * @return void
     */
    public function run(): void
    {
        // Armors
        $hylianHood = Armor::where("name", "Hylian Hood")->first()->id;
        $hylianTunic = Armor::where("name", "Hylian Tunic")->first()->id;
        $hylianTrousers = Armor::where("name", "Hylian Trousers")->first()->id;

        // Resources
        $this->bokoblinHorn = Resource::where(
            "name",
            "Bokoblin Horn",
        )->first()->id;
        $this->bokoblinFang = Resource::where(
            "name",
            "Bokoblin Fang",
        )->first()->id;
        $this->bokoblinGuts = Resource::where(
            "name",
            "Bokoblin Guts",
        )->first()->id;
        $this->amber = Resource::where("name", "Amber")->first()->id;

        $armorResources = new Collection();

        // Hylian Set
        $armorResources->push($this->hylianSet($hylianHood));
        $armorResources->push($this->hylianSet($hylianTunic));
        $armorResources->push($this->hylianSet($hylianTrousers));
        $armorResources = $armorResources->flatten(1);

        DB::table("armor_resource")->insert($armorResources->toArray());
    }

    /**
     * Since each of the Hylian armor pieces needs the exact same resources
     * for each tier, we can combine them into a single private method
     * to keep to DRY principles.
     *
     * @param mixed $armor
     * @return Collection
     */
    private function hylianSet(mixed $armor): Collection
    {
        return collect([
            [
                "armor_id" => $armor,
                "resource_id" => $this->bokoblinHorn,
                "tier" => 1,
                "quantity_needed" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->bokoblinHorn,
                "tier" => 2,
                "quantity_needed" => 8,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->bokoblinFang,
                "tier" => 2,
                "quantity_needed" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->bokoblinFang,
                "tier" => 3,
                "quantity_needed" => 10,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->bokoblinGuts,
                "tier" => 3,
                "quantity_needed" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->bokoblinGuts,
                "tier" => 4,
                "quantity_needed" => 15,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->amber,
                "tier" => 4,
                "quantity_needed" => 15,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
