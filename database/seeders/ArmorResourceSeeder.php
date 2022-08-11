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
        $bokoblinHorn = Resource::where("name", "Bokoblin Horn")->first()->id;
        $bokoblinFang = Resource::where("name", "Bokoblin Fang")->first()->id;
        $bokoblinGuts = Resource::where("name", "Bokoblin Guts")->first()->id;
        $amber = Resource::where("name", "Amber")->first()->id;
        $moblinGuts = Resource::where("name", "Moblin Guts")->first()->id;
        $lizalfosTail = Resource::where("name", "Lizalfos Tail")->first()->id;
        $lynelHoof = Resource::where("name", "Lynel Hoof")->first()->id;
        $lynelGuts = Resource::where("name", "Lynel Guts")->first()->id;
        $chuchuJelly = Resource::where("name", "Chuchu Jelly")->first()->id;
        $keeseWing = Resource::where("name", "Keese Wing")->first()->id;
        $keeseEyeball = Resource::where("name", "Keese Eyeball")->first()->id;
        $hinoxGuts = Resource::where("name", "Hinox Guts")->first()->id;

        $armorResources = new Collection();

        // Hylian Set
        $hylianData = collect([
            [1, $bokoblinHorn, 5],
            [2, $bokoblinHorn, 8],
            [2, $bokoblinFang, 5],
            [3, $bokoblinFang, 10],
            [3, $bokoblinGuts, 5],
            [4, $bokoblinGuts, 15],
            [4, $amber, 30],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($hylianHood, $hylianData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($hylianTunic, $hylianData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($hylianTrousers, $hylianData),
        );

        // Soldier's Set
        $soldiersData = collect([
            [1, $chuchuJelly, 5],
            [1, $bokoblinGuts, 3],
            [2, $keeseEyeball, 3],
            [2, $moblinGuts, 3],
            [3, $lizalfosTail, 5],
            [3, $hinoxGuts, 2],
            [4, $lynelHoof, 4],
            [4, $lynelGuts, 2],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($soldiersHelm, $soldiersData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($soldiersArmor, $soldiersData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($soldiersGreaves, $soldiersData),
        );

        $armorResources = $armorResources->flatten(1);
        DB::table("armor_resource")->insert($armorResources->toArray());
    }

    /**
     * Given an ID of the Armor from the `armors` table and the various requirements needed to
     * upgrade it to various tiers, this function will convert it into a proper Collection
     * ready for inserting into the database table.
     *
     * @param integer $armorId The ID of the Armor in the `armors` table
     * @param Collection $requirements A collection of three-item arrays detailing the requirements
     * @return Collection The armor and its requirements formatted for entering into the database
     */
    private function buildArmorRequirements(
        int $armorId,
        Collection $requirements,
    ): Collection {
        return collect(
            $requirements->map(function ($requirement) use ($armorId) {
                return [
                    "armor_id" => $armorId,
                    "resource_id" => $requirement[1],
                    "tier" => $requirement[0],
                    "quantity_needed" => $requirement[2],
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
            }),
        );
    }
}
