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
     */
    public function run(): void
    {
        // Armors
        $championsTunic = Armor::where("name", "Champion's Tunic")->first()->id;
        $hylianHood = Armor::where("name", "Hylian Hood")->first()->id;
        $hylianTunic = Armor::where("name", "Hylian Tunic")->first()->id;
        $hylianTrousers = Armor::where("name", "Hylian Trousers")->first()->id;
        $soldiersHelm = Armor::where("name", "Soldier's Helm")->first()->id;
        $soldiersArmor = Armor::where("name", "Soldier's Armor")->first()->id;
        $soldiersGreaves = Armor::where("name", "Soldier's Greaves")->first()->id;
        $amberEarrings = Armor::where("name", "Amber Earrings")->first()->id;
        $rubyCirclet = Armor::where("name", "Ruby Circlet")->first()->id;
        $snowquillHeaddress = Armor::where("name", "Snowquill Headdress")->first()->id;
        $snowquillTunic = Armor::where("name", "Snowquill Tunic")->first()->id;
        $snowquillTrousers = Armor::where("name", "Snowquill Trousers")->first()->id;
        $sapphireCirclet = Armor::where("name", "Sapphire Circlet")->first()->id;
        $desertVoeHeadband = Armor::where("name", "Desert Voe Headband")->first()->id;
        $desertVoeSpaulder = Armor::where("name", "Desert Voe Spaulder")->first()->id;
        $desertVoeTrousers = Armor::where("name", "Desert Voe Trousers")->first()->id;
        $topazEarrings = Armor::where("name", "Topaz Earrings")->first()->id;

        // Resources
        $sunshroom = Resource::where("name", "Sunshroom")->first()->id;
        $warmSafflina = Resource::where("name", "Warm Safflina")->first()->id;
        $silentPrincess = Resource::where("name", "Silent Princess")->first()->id;
        $shardOfDinraalsHorn = Resource::where("name", "Shard of Dinraal's Horn")->first()->id;
        $shardOfNaydrasHorn = Resource::where("name", "Shard of Naydra's Horn")->first()->id;
        $shardOfFaroshsHorn = Resource::where("name", "Shard of Farosh's Horn")->first()->id;
        $flint = Resource::where("name", "Flint")->first()->id;
        $amber = Resource::where("name", "Amber")->first()->id;
        $topaz = Resource::where("name", "Topaz")->first()->id;
        $ruby = Resource::where("name", "Ruby")->first()->id;
        $sapphire = Resource::where("name", "Sapphire")->first()->id;
        $starFragment = Resource::where("name", "Star Fragment")->first()->id;
        $bokoblinHorn = Resource::where("name", "Bokoblin Horn")->first()->id;
        $bokoblinFang = Resource::where("name", "Bokoblin Fang")->first()->id;
        $bokoblinGuts = Resource::where("name", "Bokoblin Guts")->first()->id;
        $moblinGuts = Resource::where("name", "Moblin Guts")->first()->id;
        $lizalfosTail = Resource::where("name", "Lizalfos Tail")->first()->id;
        $icyLizalfosTail = Resource::where("name", "Icy Lizalfos Tail")->first()->id;
        $redLizalfosTail = Resource::where("name", "Red Lizalfos Tail")->first()->id;
        $lynelHoof = Resource::where("name", "Lynel Hoof")->first()->id;
        $lynelGuts = Resource::where("name", "Lynel Guts")->first()->id;
        $chuchuJelly = Resource::where("name", "Chuchu Jelly")->first()->id;
        $whiteChuchuJelly = Resource::where("name", "White Chuchu Jelly")->first()->id;
        $redChuchuJelly = Resource::where("name", "Red Chuchu Jelly")->first()->id;
        $keeseWing = Resource::where("name", "Keese Wing")->first()->id;
        $iceKeeseWing = Resource::where("name", "Ice Keese Wing")->first()->id;
        $fireKeeseWing = Resource::where("name", "Fire Keese Wing")->first()->id;
        $keeseEyeball = Resource::where("name", "Keese Eyeball")->first()->id;
        $hinoxGuts = Resource::where("name", "Hinox Guts")->first()->id;

        $armorResources = new Collection();

        $armorResources->push(
            $this->buildArmorRequirements($championsTunic, collect([
                [1, $silentPrincess, 3],
                [2, $silentPrincess, 3],
                [2, $shardOfFaroshsHorn, 2],
                [2, $silentPrincess, 3],
                [2, $shardOfNaydrasHorn, 2],
                [2, $silentPrincess, 3],
                [2, $shardOfDinraalsHorn, 2],
            ])),
        );

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

        $armorResources->push(
            $this->buildArmorRequirements($amberEarrings, collect([
                [1, $amber, 3],
                [1, $flint, 3],
                [2, $amber, 10],
                [2, $flint, 3],
                [3, $amber, 20],
                [3, $flint, 3],
                [4, $amber, 30],
                [4, $flint, 3],
            ])),
        );

        $armorResources->push(
            $this->buildArmorRequirements($rubyCirclet, collect([
                [1, $ruby, 2],
                [1, $flint, 3],
                [2, $ruby, 4],
                [2, $flint, 3],
                [3, $ruby, 6],
                [3, $starFragment, 1],
                [4, $ruby, 10],
                [4, $starFragment, 1],
            ])),
        );

        // Snowquill Set
        $snowquillData = collect([
            [1, $redChuchuJelly, 3],
            [2, $redChuchuJelly, 5],
            [2, $warmSafflina, 3],
            [3, $fireKeeseWing, 8],
            [3, $sunshroom, 5],
            [4, $redLizalfosTail, 10],
            [4, $ruby, 5],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($snowquillHeaddress, $snowquillData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($snowquillTunic, $snowquillData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($snowquillTrousers, $snowquillData),
        );

        $armorResources->push(
            $this->buildArmorRequirements($sapphireCirclet, collect([
                [1, $sapphire, 2],
                [1, $flint, 3],
                [2, $sapphire, 4],
                [2, $flint, 3],
                [3, $sapphire, 6],
                [3, $starFragment, 1],
                [4, $sapphire, 10],
                [4, $starFragment, 1],
            ])),
        );

        // Desert Voe Set
        $desertVoeData = collect([
            [1, $whiteChuchuJelly, 3],
            [2, $whiteChuchuJelly, 5],
            [2, $iceKeeseWing, 3],
            [3, $iceKeeseWing, 8],
            [3, $icyLizalfosTail, 3],
            [4, $icyLizalfosTail, 10],
            [4, $sapphire, 5],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($desertVoeHeadband, $desertVoeData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($desertVoeSpaulder, $desertVoeData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($desertVoeTrousers, $desertVoeData),
        );

        $armorResources->push(
            $this->buildArmorRequirements($topazEarrings, collect([
                [1, $topaz, 2],
                [1, $flint, 3],
                [2, $topaz, 4],
                [2, $flint, 3],
                [3, $topaz, 6],
                [3, $starFragment, 1],
                [4, $topaz, 10],
                [4, $starFragment, 1],
            ])),
        );

        // Populate the database.
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
