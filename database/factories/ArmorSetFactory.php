<?php

namespace Database\Factories;

use App\Models\ArmorSet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ArmorSet>
 */
class ArmorSetFactory extends Factory
{
    protected $model = ArmorSet::class;

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
