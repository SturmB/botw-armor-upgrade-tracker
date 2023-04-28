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
        $rubberHelm = Armor::where("name", "Rubber Helm")->first()->id;
        $rubberArmor = Armor::where("name", "Rubber Armor")->first()->id;
        $rubberTights = Armor::where("name", "Rubber Tights")->first()->id;
        $flamebreakerHelm = Armor::where("name", "Flamebreaker Helm")->first()->id;
        $flamebreakerArmor = Armor::where("name", "Flamebreaker Armor")->first()->id;
        $flamebreakerBoots = Armor::where("name", "Flamebreaker Boots")->first()->id;
        $opalEarrings = Armor::where("name", "Opal Earrings")->first()->id;
        $zoraHelm = Armor::where("name", "Zora Helm")->first()->id;
        $zoraArmor = Armor::where("name", "Zora Armor")->first()->id;
        $zoraGreaves = Armor::where("name", "Zora Greaves")->first()->id;
        $stealthMask = Armor::where("name", "Stealth Mask")->first()->id;
        $stealthChestGuard = Armor::where("name", "Stealth Chest Guard")->first()->id;
        $stealthTights = Armor::where("name", "Stealth Tights")->first()->id;
        $sheiksMask = Armor::where("name", "Sheik's Mask")->first()->id;
        $climbersBandanna = Armor::where("name", "Climber's Bandanna")->first()->id;
        $climbingGear = Armor::where("name", "Climbing Gear")->first()->id;
        $climbingBoots = Armor::where("name", "Climbing Boots")->first()->id;
        $barbarianHelm = Armor::where("name", "Barbarian Helm")->first()->id;
        $barbarianArmor = Armor::where("name", "Barbarian Armor")->first()->id;
        $barbarianLegWraps = Armor::where("name", "Barbarian Leg Wraps")->first()->id;
        $fierceDeityMask = Armor::where("name", "Fierce Deity Mask")->first()->id;
        $fierceDeityArmor = Armor::where("name", "Fierce Deity Armor")->first()->id;
        $fierceDeityBoots = Armor::where("name", "Fierce Deity Boots")->first()->id;
        $radiantMask = Armor::where("name", "Radiant Mask")->first()->id;
        $radiantShirt = Armor::where("name", "Radiant Shirt")->first()->id;
        $radiantTights = Armor::where("name", "Radiant Tights")->first()->id;
        $diamondCirclet = Armor::where("name", "Diamond Circlet")->first()->id;
        $ancientHelm = Armor::where("name", "Ancient Helm")->first()->id;
        $ancientCuirass = Armor::where("name", "Ancient Cuirass")->first()->id;
        $ancientGreaves = Armor::where("name", "Ancient Greaves")->first()->id;
        $sandBoots = Armor::where("name", "Sand Boots")->first()->id;
        $snowBoots = Armor::where("name", "Snow Boots")->first()->id;
        $capOfTime = Armor::where("name", "Cap of Time")->first()->id;
        $tunicOfTime = Armor::where("name", "Tunic of Time")->first()->id;
        $trousersOfTime = Armor::where("name", "Trousers of Time")->first()->id;
        $capOfTheWind = Armor::where("name", "Cap of the Wind")->first()->id;
        $tunicOfTheWind = Armor::where("name", "Tunic of the Wind")->first()->id;
        $trousersOfTheWind = Armor::where("name", "Trousers of the Wind")->first()->id;
        $capOfTwilight = Armor::where("name", "Cap of Twilight")->first()->id;
        $tunicOfTwilight = Armor::where("name", "Tunic of Twilight")->first()->id;
        $trousersOfTwilight = Armor::where("name", "Trousers of Twilight")->first()->id;
        $capOfTheSky = Armor::where("name", "Cap of the Sky")->first()->id;
        $tunicOfTheSky = Armor::where("name", "Tunic of the Sky")->first()->id;
        $trousersOfTheSky = Armor::where("name", "Trousers of the Sky")->first()->id;
        $capOfTheHero = Armor::where("name", "Cap of the Hero")->first()->id;
        $tunicOfTheHero = Armor::where("name", "Tunic of the Hero")->first()->id;
        $trousersOfTheHero = Armor::where("name", "Trousers of the Hero")->first()->id;
        $capOfTheWild = Armor::where("name", "Cap of the Wild")->first()->id;
        $tunicOfTheWild = Armor::where("name", "Tunic of the Wild")->first()->id;
        $trousersOfTheWild = Armor::where("name", "Trousers of the Wild")->first()->id;
        $vahRutaDivineHelm = Armor::where("name", "Vah Ruta Divine Helm")->first()->id;
        $vahMedohDivineHelm = Armor::where("name", "Vah Medoh Divine Helm")->first()->id;
        $vahRudaniaDivineHelm = Armor::where("name", "Vah Rudania Divine Helm")->first()->id;
        $vahNaborisDivineHelm = Armor::where("name", "Vah Naboris Divine Helm")->first()->id;

        // Resources
        $voltfruit = Resource::where("name", "Voltfruit")->first()->id;
        $sunshroom = Resource::where("name", "Sunshroom")->first()->id;
        $zapshroom = Resource::where("name", "Zapshroom")->first()->id;
        $rushroom = Resource::where("name", "Rushroom")->first()->id;
        $silentShroom = Resource::where("name", "Silent Shroom")->first()->id;
        $swiftCarrot = Resource::where("name", "Swift Carrot")->first()->id;
        $warmSafflina = Resource::where("name", "Warm Safflina")->first()->id;
        $swiftViolet = Resource::where("name", "Swift Violet")->first()->id;
        $blueNightshade = Resource::where("name", "Blue Nightshade")->first()->id;
        $silentPrincess = Resource::where("name", "Silent Princess")->first()->id;
        $courserBeeHoney = Resource::where("name", "Courser Bee Honey")->first()->id;
        $acorn = Resource::where("name", "Acorn")->first()->id;
        $starFragment = Resource::where("name", "Star Fragment")->first()->id;
        $dinraalsScale = Resource::where("name", "Dinraal's Scale")->first()->id;
        $dinraalsClaw = Resource::where("name", "Dinraal's Claw")->first()->id;
        $shardOfDinraalsFang = Resource::where("name", "Shard of Dinraal's Fang")->first()->id;
        $shardOfDinraalsHorn = Resource::where("name", "Shard of Dinraal's Horn")->first()->id;
        $naydrasScale = Resource::where("name", "Naydra's Scale")->first()->id;
        $naydrasClaw = Resource::where("name", "Naydra's Claw")->first()->id;
        $shardOfNaydrasFang = Resource::where("name", "Shard of Naydra's Fang")->first()->id;
        $shardOfNaydrasHorn = Resource::where("name", "Shard of Naydra's Horn")->first()->id;
        $faroshsScale = Resource::where("name", "Farosh's Scale")->first()->id;
        $faroshsClaw = Resource::where("name", "Farosh's Claw")->first()->id;
        $shardOfFaroshsFang = Resource::where("name", "Shard of Farosh's Fang")->first()->id;
        $shardOfFaroshsHorn = Resource::where("name", "Shard of Farosh's Horn")->first()->id;
        $heartyBass = Resource::where("name", "Hearty Bass")->first()->id;
        $hyruleBass = Resource::where("name", "Hyrule Bass")->first()->id;
        $stealthfinTrout = Resource::where("name", "Stealthfin Trout")->first()->id;
        $sneakyRiverSnail = Resource::where("name", "Sneaky River Snail")->first()->id;
        $smotherwingButterfly = Resource::where("name", "Smotherwing Butterfly")->first()->id;
        $energeticRhinoBeetle = Resource::where("name", "Energetic Rhino Beetle")->first()->id;
        $sunsetFirefly = Resource::where("name", "Sunset Firefly")->first()->id;
        $hotFootedFrog = Resource::where("name", "Hot-Footed Frog")->first()->id;
        $hightailLizard = Resource::where("name", "Hightail Lizard")->first()->id;
        $fireproofLizard = Resource::where("name", "Fireproof Lizard")->first()->id;
        $flint = Resource::where("name", "Flint")->first()->id;
        $amber = Resource::where("name", "Amber")->first()->id;
        $opal = Resource::where("name", "Opal")->first()->id;
        $luminousStone = Resource::where("name", "Luminous Stone")->first()->id;
        $topaz = Resource::where("name", "Topaz")->first()->id;
        $ruby = Resource::where("name", "Ruby")->first()->id;
        $sapphire = Resource::where("name", "Sapphire")->first()->id;
        $diamond = Resource::where("name", "Diamond")->first()->id;
        $bokoblinHorn = Resource::where("name", "Bokoblin Horn")->first()->id;
        $bokoblinFang = Resource::where("name", "Bokoblin Fang")->first()->id;
        $bokoblinGuts = Resource::where("name", "Bokoblin Guts")->first()->id;
        $moblinHorn = Resource::where("name", "Moblin Horn")->first()->id;
        $moblinFang = Resource::where("name", "Moblin Fang")->first()->id;
        $moblinGuts = Resource::where("name", "Moblin Guts")->first()->id;
        $lizalfosHorn = Resource::where("name", "Lizalfos Horn")->first()->id;
        $lizalfosTalon = Resource::where("name", "Lizalfos Talon")->first()->id;
        $lizalfosTail = Resource::where("name", "Lizalfos Tail")->first()->id;
        $icyLizalfosTail = Resource::where("name", "Icy Lizalfos Tail")->first()->id;
        $redLizalfosTail = Resource::where("name", "Red Lizalfos Tail")->first()->id;
        $yellowLizalfosTail = Resource::where("name", "Yellow Lizalfos Tail")->first()->id;
        $lynelHorn = Resource::where("name", "Lynel Horn")->first()->id;
        $lynelHoof = Resource::where("name", "Lynel Hoof")->first()->id;
        $lynelGuts = Resource::where("name", "Lynel Guts")->first()->id;
        $chuchuJelly = Resource::where("name", "Chuchu Jelly")->first()->id;
        $whiteChuchuJelly = Resource::where("name", "White Chuchu Jelly")->first()->id;
        $redChuchuJelly = Resource::where("name", "Red Chuchu Jelly")->first()->id;
        $yellowChuchuJelly = Resource::where("name", "Yellow Chuchu Jelly")->first()->id;
        $keeseWing = Resource::where("name", "Keese Wing")->first()->id;
        $iceKeeseWing = Resource::where("name", "Ice Keese Wing")->first()->id;
        $fireKeeseWing = Resource::where("name", "Fire Keese Wing")->first()->id;
        $electricKeeseWing = Resource::where("name", "Electric Keese Wing")->first()->id;
        $keeseEyeball = Resource::where("name", "Keese Eyeball")->first()->id;
        $octorokTentacle = Resource::where("name", "Octorok Tentacle")->first()->id;
        $octorokEyeball = Resource::where("name", "Octorok Eyeball")->first()->id;
        $octoBalloon = Resource::where("name", "Octo Balloon")->first()->id;
        $moldugaFin = Resource::where("name", "Molduga Fin")->first()->id;
        $moldugaGuts = Resource::where("name", "Molduga Guts")->first()->id;
        $hinoxToenail = Resource::where("name", "Hinox Toenail")->first()->id;
        $hinoxTooth = Resource::where("name", "Hinox Tooth")->first()->id;
        $hinoxGuts = Resource::where("name", "Hinox Guts")->first()->id;
        $ancientScrew = Resource::where("name", "Ancient Screw")->first()->id;
        $ancientSpring = Resource::where("name", "Ancient Spring")->first()->id;
        $ancientGear = Resource::where("name", "Ancient Gear")->first()->id;
        $ancientShaft = Resource::where("name", "Ancient Shaft")->first()->id;
        $ancientCore = Resource::where("name", "Ancient Core")->first()->id;
        $giantAncientCore = Resource::where("name", "Giant Ancient Core")->first()->id;

        $armorResources = new Collection();

        $armorResources->push(
            $this->buildArmorRequirements($championsTunic, collect([
                [1, $silentPrincess, 3],
                [2, $silentPrincess, 3],
                [2, $shardOfFaroshsHorn, 2],
                [3, $silentPrincess, 3],
                [3, $shardOfNaydrasHorn, 2],
                [4, $silentPrincess, 3],
                [4, $shardOfDinraalsHorn, 2],
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

        // Rubber Set
        $rubberData = collect([
            [1, $yellowChuchuJelly, 3],
            [2, $yellowChuchuJelly, 5],
            [2, $voltfruit, 5],
            [3, $zapshroom, 5],
            [3, $yellowLizalfosTail, 5],
            [4, $yellowLizalfosTail, 10],
            [4, $topaz, 10],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($rubberHelm, $rubberData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($rubberArmor, $rubberData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($rubberTights, $rubberData),
        );

        // Flamebreaker Set
        $flamebreakerData = collect([
            [1, $fireproofLizard, 3],
            [1, $moblinHorn, 3],
            [2, $fireproofLizard, 5],
            [2, $moblinFang, 5],
            [3, $smotherwingButterfly, 5],
            [3, $moblinGuts, 3],
            [4, $smotherwingButterfly, 8],
            [4, $hinoxGuts, 5],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($flamebreakerHelm, $flamebreakerData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($flamebreakerArmor, $flamebreakerData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($flamebreakerBoots, $flamebreakerData),
        );

        $armorResources->push(
            $this->buildArmorRequirements($opalEarrings, collect([
                [1, $opal, 3],
                [1, $flint, 3],
                [2, $opal, 8],
                [2, $flint, 3],
                [3, $opal, 16],
                [3, $flint, 3],
                [4, $opal, 20],
                [4, $flint, 3],
            ])),
        );

        // Zora Set
        $zoraData = collect([
            [1, $lizalfosHorn, 3],
            [2, $lizalfosTalon, 5],
            [2, $hyruleBass, 5],
            [3, $lizalfosTail, 5],
            [3, $heartyBass, 5],
            [4, $lizalfosTail, 10],
            [4, $opal, 15],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($zoraHelm, $zoraData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($zoraArmor, $zoraData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($zoraGreaves, $zoraData),
        );

        // Stealth Set
        $stealthData = collect([
            [1, $blueNightshade, 3],
            [2, $blueNightshade, 5],
            [2, $sunsetFirefly, 5],
            [3, $silentShroom, 8],
            [3, $sneakyRiverSnail, 5],
            [4, $stealthfinTrout, 10],
            [4, $silentPrincess, 5],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($stealthMask, $stealthData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($stealthChestGuard, $stealthData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($stealthTights, $stealthData),
        );

        $armorResources->push(
            $this->buildArmorRequirements($sheiksMask, collect([
                [1, $silentPrincess, 1],
                [1, $starFragment, 1],
                [2, $silentPrincess, 2],
                [2, $starFragment, 2],
                [3, $silentPrincess, 3],
                [3, $starFragment, 3],
                [4, $silentPrincess, 4],
                [4, $starFragment, 4],
            ])),
        );

        // Climbing Set
        $climbingData = collect([
            [1, $keeseWing, 3],
            [1, $rushroom, 3],
            [2, $electricKeeseWing, 5],
            [2, $hightailLizard, 5],
            [3, $iceKeeseWing, 5],
            [3, $hotFootedFrog, 10],
            [4, $fireKeeseWing, 5],
            [4, $swiftViolet, 20],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($climbersBandanna, $climbingData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($climbingGear, $climbingData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($climbingBoots, $climbingData),
        );

        // Barbarian Set
        $barbarianData = collect([
            [1, $lynelHorn, 3],
            [2, $lynelHorn, 5],
            [2, $lynelHoof, 3],
            [3, $lynelHoof, 8],
            [3, $lynelGuts, 1],
            [4, $lynelGuts, 2],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($barbarianHelm, $barbarianData->concat([[4, $shardOfDinraalsHorn, 1]])),
        );
        $armorResources->push(
            $this->buildArmorRequirements($barbarianArmor, $barbarianData->concat([[4, $shardOfFaroshsHorn, 1]])),
        );
        $armorResources->push(
            $this->buildArmorRequirements($barbarianLegWraps, $barbarianData->concat([[4, $shardOfNaydrasHorn, 1]])),
        );

        // Fierce Deity Set
        $fierceDeityData = collect([
            [1, $hinoxToenail, 5],
            [2, $hinoxTooth, 5],
            [3, $hinoxGuts, 5],
            [4, $lynelGuts, 5],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($fierceDeityMask, $fierceDeityData->concat([
                [1, $dinraalsScale, 1],
                [2, $dinraalsClaw, 1],
                [3, $shardOfDinraalsFang, 1],
                [4, $shardOfDinraalsHorn, 1],
            ])),
        );
        $armorResources->push(
            $this->buildArmorRequirements($fierceDeityArmor, $fierceDeityData->concat([
                [1, $naydrasScale, 1],
                [2, $naydrasClaw, 1],
                [3, $shardOfNaydrasFang, 1],
                [4, $shardOfNaydrasHorn, 1],
            ])),
        );
        $armorResources->push(
            $this->buildArmorRequirements($fierceDeityBoots, $fierceDeityData->concat([
                [1, $faroshsScale, 1],
                [2, $faroshsClaw, 1],
                [3, $shardOfFaroshsFang, 1],
                [4, $shardOfFaroshsHorn, 1],
            ])),
        );

        // Radiant Set
        $radiantData = collect([
            [1, $luminousStone, 5],
            [1, $bokoblinGuts, 3],
            [2, $luminousStone, 8],
            [2, $moblinGuts, 3],
            [3, $luminousStone, 10],
            [3, $moldugaGuts, 3],
            [4, $luminousStone, 20],
            [4, $lynelGuts, 1],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($radiantMask, $radiantData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($radiantShirt, $radiantData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($radiantTights, $radiantData),
        );

        $armorResources->push(
            $this->buildArmorRequirements($diamondCirclet, collect([
                [1, $diamond, 2],
                [1, $flint, 3],
                [2, $diamond, 4],
                [2, $flint, 3],
                [3, $diamond, 6],
                [3, $starFragment, 1],
                [4, $diamond, 10],
                [4, $starFragment, 1],
            ])),
        );

        // Ancient Set
        $ancientData = collect([
            [1, $ancientScrew, 5],
            [1, $ancientSpring, 5],
            [2, $ancientSpring, 15],
            [2, $ancientGear, 10],
            [3, $ancientShaft, 15],
            [3, $ancientCore, 5],
            [4, $starFragment, 1],
            [4, $giantAncientCore, 2],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($ancientHelm, $ancientData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($ancientCuirass, $ancientData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($ancientGreaves, $ancientData),
        );

        $armorResources->push(
            $this->buildArmorRequirements($sandBoots, collect([
                [1, $moldugaFin, 5],
                [1, $hightailLizard, 10],
                [2, $moldugaFin, 10],
                [2, $swiftCarrot, 10],
                [3, $moldugaGuts, 3],
                [3, $rushroom, 15],
                [4, $moldugaGuts, 5],
                [4, $swiftViolet, 15],
            ])),
        );

        $armorResources->push(
            $this->buildArmorRequirements($snowBoots, collect([
                [1, $octorokTentacle, 5],
                [1, $hightailLizard, 10],
                [2, $octoBalloon, 5],
                [2, $swiftCarrot, 10],
                [3, $octorokEyeball, 5],
                [3, $rushroom, 15],
                [4, $naydrasScale, 2],
                [4, $swiftViolet, 15],
            ])),
        );

        // Hero of Time Set
        $heroOfTimeData = collect([
            [1, $amber, 3],
            [1, $starFragment, 1],
            [2, $amber, 5],
            [2, $starFragment, 2],
            [3, $amber, 15],
            [3, $starFragment, 3],
            [4, $amber, 30],
            [4, $starFragment, 4],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($capOfTime, $heroOfTimeData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($tunicOfTime, $heroOfTimeData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($trousersOfTime, $heroOfTimeData),
        );

        // Hero of Winds Set
        $heroOfTheWindsData = collect([
            [1, $opal, 3],
            [1, $starFragment, 1],
            [2, $opal, 5],
            [2, $starFragment, 2],
            [3, $opal, 10],
            [3, $starFragment, 3],
            [4, $opal, 20],
            [4, $starFragment, 4],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($capOfTheWind, $heroOfTheWindsData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($tunicOfTheWind, $heroOfTheWindsData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($trousersOfTheWind, $heroOfTheWindsData),
        );

        // Hero of Twilight Set
        $heroOfTwilightData = collect([
            [1, $topaz, 1],
            [1, $starFragment, 1],
            [2, $topaz, 3],
            [2, $starFragment, 1],
            [3, $topaz, 5],
            [3, $starFragment, 1],
            [4, $topaz, 10],
            [4, $starFragment, 1],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($capOfTwilight, $heroOfTwilightData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($tunicOfTwilight, $heroOfTwilightData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($trousersOfTwilight, $heroOfTwilightData),
        );

        // Hero of the Sky Set
        $heroOfTheSkyData = collect([
            [1, $sapphire, 1],
            [1, $starFragment, 1],
            [2, $sapphire, 3],
            [2, $starFragment, 2],
            [3, $sapphire, 5],
            [3, $starFragment, 3],
            [4, $sapphire, 10],
            [4, $starFragment, 4],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($capOfTheSky, $heroOfTheSkyData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($tunicOfTheSky, $heroOfTheSkyData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($trousersOfTheSky, $heroOfTheSkyData),
        );

        // Hero Set
        $heroData = collect([
            [1, $ruby, 1],
            [1, $starFragment, 1],
            [2, $ruby, 3],
            [2, $starFragment, 2],
            [3, $ruby, 5],
            [3, $starFragment, 3],
            [4, $ruby, 10],
            [4, $starFragment, 4],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($capOfTheHero, $heroData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($tunicOfTheHero, $heroData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($trousersOfTheHero, $heroData),
        );

        // Hero of the Wild Set
        $heroofTheWildData = collect([
            [1, $acorn, 10],
            [2, $courserBeeHoney, 5],
            [3, $energeticRhinoBeetle, 5],
            [4, $starFragment, 1],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($capOfTheWild, $heroofTheWildData->concat([
                [1, $faroshsScale, 2],
                [2, $faroshsClaw, 2],
                [3, $shardOfFaroshsFang, 2],
                [4, $shardOfFaroshsHorn, 2],
            ])),
        );
        $armorResources->push(
            $this->buildArmorRequirements($tunicOfTheWild, $heroofTheWildData->concat([
                [1, $naydrasScale, 2],
                [2, $naydrasClaw, 2],
                [3, $shardOfNaydrasFang, 2],
                [4, $shardOfNaydrasHorn, 2],
            ])),
        );
        $armorResources->push(
            $this->buildArmorRequirements($trousersOfTheWild, $heroofTheWildData->concat([
                [1, $dinraalsScale, 2],
                [2, $dinraalsClaw, 2],
                [3, $shardOfDinraalsFang, 2],
                [4, $shardOfDinraalsHorn, 2],
            ])),
        );

        // Divine Helms
        $divineHelmData = collect([
            [1, $ancientScrew, 5],
            [1, $ancientSpring, 5],
            [2, $ancientSpring, 15],
            [2, $ancientGear, 10],
            [3, $ancientShaft, 15],
            [3, $ancientCore, 5],
            [4, $starFragment, 1],
            [4, $giantAncientCore, 2],
        ]);
        $armorResources->push(
            $this->buildArmorRequirements($vahRutaDivineHelm, $divineHelmData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($vahMedohDivineHelm, $divineHelmData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($vahRudaniaDivineHelm, $divineHelmData),
        );
        $armorResources->push(
            $this->buildArmorRequirements($vahNaborisDivineHelm, $divineHelmData),
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
