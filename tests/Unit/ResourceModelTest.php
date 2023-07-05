<?php

namespace Tests\Unit;

use App\Models\BotwArmor;
use App\Models\BotwRequirement;
use App\Models\BotwResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResourceModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Makes sure the model is working.
     *
     * @return void
     */
    public function test_saves_resource_model_to_database(): void
    {
        $resource = BotwResource::factory()->create();

        $this->assertModelExists($resource);
    }

    /**
     * Makes sure the armors many-to-many relationship is working.
     *
     * @return void
     */
    public function test_resource_is_connected_to_armors_with_pivot(): void
    {
        $resource = BotwResource::factory()
            ->hasAttached(BotwArmor::factory()->count(3), [
                "tier" => fake()->numberBetween(1, 4),
                "quantity_needed" => fake()->numberBetween(1, 50),
            ])
            ->create();

        $this->assertModelExists($resource->armors->first());
        $this->assertModelExists($resource->armors->first()->pivot);
    }

    /**
     * Makes sure the users many-to-many relationship is working.
     *
     * @return void
     */
    public function test_resource_is_connected_to_users_with_pivot(): void
    {
        $resource = BotwResource::factory()
            ->has(User::factory()->count(3))
            ->create();

        $this->assertModelExists($resource->users->first());
    }

    /**
     * Makes sure the requirements one-to-many relationship is working.
     *
     * @return void
     */
    public function test_resource_is_connected_to_requirements(): void
    {
        $resource = BotwResource::factory()
            ->has(BotwRequirement::factory()->count(3))
            ->create();

        $this->assertModelExists($resource->requirements->first());
    }
}
