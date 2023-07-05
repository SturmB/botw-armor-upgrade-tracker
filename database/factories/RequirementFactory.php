<?php

namespace Database\Factories;

use App\Models\BotwArmor;
use App\Models\BotwRequirement;
use App\Models\BotwResource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BotwRequirement>
 */
class RequirementFactory extends Factory
{
    protected $model = BotwRequirement::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "armor_id" => fn () => BotwArmor::factory()->create(),
            "resource_id" => fn () => BotwResource::factory()->create(),
            "tier" => fake()->numberBetween(1, 4),
            "quantity_needed" => fake()->numberBetween(1, 50),
        ];
    }
}
