<?php

namespace Database\Factories;

use App\Models\BotwResource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BotwResource>
 */
class ResourceFactory extends Factory
{
    protected $model = BotwResource::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->word(),
            "image" => fake()->filePath(),
        ];
    }
}
