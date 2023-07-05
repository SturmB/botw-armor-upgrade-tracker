<?php

namespace Database\Factories;

use App\Models\BotwArmorSet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BotwArmorSet>
 */
class ArmorSetFactory extends Factory
{
    protected $model = BotwArmorSet::class;

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
        ];
    }
}
