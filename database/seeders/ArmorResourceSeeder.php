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

    private int $bokoblinHorn,
        $bokoblinFang,
        $bokoblinGuts,
        $amber,
        $moblinGuts,
        $lizalfosTail,
        $lynelHoof,
        $lynelGuts,
        $chuchuJelly,
        $keeseWing,
        $hinoxGuts;

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
        $soldiersHelm = Armor::where("name", "Soldier's Helm")->first()->id;
        $soldiersArmor = Armor::where("name", "Soldier's Armor")->first()->id;
        $soldiersGreaves = Armor::where("name", "Soldier's Greaves")->first()
            ->id;

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
        $this->moblinGuts = Resource::where("name", "Moblin Guts")->first()->id;
        $this->lizalfosTail = Resource::where(
            "name",
            "Lizalfos Tail",
        )->first()->id;
        $this->lynelHoof = Resource::where("name", "Lynel Hoof")->first()->id;
        $this->lynelGuts = Resource::where("name", "Lynel Guts")->first()->id;
        $this->chuchuJelly = Resource::where(
            "name",
            "Chuchu Jelly",
        )->first()->id;
        $this->keeseWing = Resource::where("name", "Keese Wing")->first()->id;
        $this->hinoxGuts = Resource::where("name", "Hinox Guts")->first()->id;

        $armorResources = new Collection();

        // Hylian Set
        $armorResources->push($this->hylianSet($hylianHood));
        $armorResources->push($this->hylianSet($hylianTunic));
        $armorResources->push($this->hylianSet($hylianTrousers));

        // Soldier's Set
        $armorResources->push($this->soldiersSet($soldiersHelm));
        $armorResources->push(
            collect([
                [
                    "armor_id" => $soldiersArmor,
                    "resource_id" => $this->chuchuJelly,
                    "tier" => 1,
                    "quantity_needed" => 5,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "armor_id" => $soldiersArmor,
                    "resource_id" => $this->bokoblinGuts,
                    "tier" => 1,
                    "quantity_needed" => 3,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "armor_id" => $soldiersArmor,
                    "resource_id" => Resource::where(
                        "name",
                        "Keese Eyeball",
                    )->first()->id,
                    "tier" => 2,
                    "quantity_needed" => 5,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "armor_id" => $soldiersArmor,
                    "resource_id" => $this->moblinGuts,
                    "tier" => 2,
                    "quantity_needed" => 3,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "armor_id" => $soldiersArmor,
                    "resource_id" => $this->lizalfosTail,
                    "tier" => 3,
                    "quantity_needed" => 3,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "armor_id" => $soldiersArmor,
                    "resource_id" => $this->hinoxGuts,
                    "tier" => 3,
                    "quantity_needed" => 1,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "armor_id" => $soldiersArmor,
                    "resource_id" => $this->lynelHoof,
                    "tier" => 4,
                    "quantity_needed" => 2,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
                [
                    "armor_id" => $soldiersArmor,
                    "resource_id" => $this->lynelGuts,
                    "tier" => 4,
                    "quantity_needed" => 2,
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
            ]),
        );
        $armorResources->push($this->soldiersSet($soldiersGreaves));

        $armorResources = $armorResources->flatten(1);
        DB::table("armor_resource")->insert($armorResources->toArray());
    }

    /**
     * Since each of the Hylian armor pieces needs the exact same resources
     * for each tier, we can combine them into a single private method
     * to keep to DRY principles.
     *
     * @param integer $armor
     * @return Collection
     */
    private function hylianSet(int $armor): Collection
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

    /**
     * Since 2 tiers of the Soldier's armor pieces needs the exact same resources,
     * we can combine them into a single private method to keep to DRY principles.
     *
     * @param integer $armor
     * @return Collection
     */
    private function soldiersSet(int $armor): Collection
    {
        return collect([
            [
                "armor_id" => $armor,
                "resource_id" => $this->chuchuJelly,
                "tier" => 1,
                "quantity_needed" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->bokoblinGuts,
                "tier" => 1,
                "quantity_needed" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->keeseWing,
                "tier" => 2,
                "quantity_needed" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->moblinGuts,
                "tier" => 2,
                "quantity_needed" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->lizalfosTail,
                "tier" => 3,
                "quantity_needed" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->hinoxGuts,
                "tier" => 3,
                "quantity_needed" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->lynelHoof,
                "tier" => 4,
                "quantity_needed" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "armor_id" => $armor,
                "resource_id" => $this->lynelGuts,
                "tier" => 4,
                "quantity_needed" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
