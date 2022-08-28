<?php

namespace Database\Factories;

use App\Models\Armor;
use App\Models\Requirement;
use App\Models\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Requirement>
 */
class RequirementFactory extends Factory
{
    protected $model = Requirement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "armor_id" => fn() => Armor::factory()->create(),
            "resource_id" => fn() => Resource::factory()->create(),
            "tier" => fake()->numberBetween(1, 4),
            "quantity_needed" => fake()->numberBetween(1, 50),
        ];
    }
}
