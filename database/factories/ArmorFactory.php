<?php

namespace Database\Factories;

use App\Models\BotwArmor;
use App\Models\BotwArmorSet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BotwArmor>
 */
class ArmorFactory extends Factory
{
    protected $model = BotwArmor::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "image" => fake()->filePath(),
            "upgradable" => fake()->boolean(),
            "armor_set_id" => fn() => BotwArmorSet::factory()->create(),
        ];
    }
}
