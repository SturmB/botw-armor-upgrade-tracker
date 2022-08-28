<?php

namespace Database\Factories;

use App\Models\Armor;
use App\Models\ArmorSet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Armor>
 */
class ArmorFactory extends Factory
{
    protected $model = Armor::class;
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
            "armor_set_id" => fn() => ArmorSet::factory()->create(),
        ];
    }
}
