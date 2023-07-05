<?php

namespace Tests\Unit;

use App\Models\BotwArmor;
use App\Models\BotwRequirement;
use App\Models\BotwResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RequirementModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Makes sure the model is working.
     *
     * @return void
     */
    public function test_saves_requirement_model_to_database(): void
    {
        $requirement = BotwRequirement::factory()->create();

        $this->assertModelExists($requirement);
    }

    /**
     * Makes sure the armor one-to-many relationship is working.
     *
     * @return void
     */
    public function test_requirement_is_connected_to_armor(): void
    {
        $requirement = BotwRequirement::factory()
            ->for(BotwArmor::factory()->create())
            ->create();

        $this->assertModelExists($requirement->armor);
    }

    /**
     * Makes sure the resource one-to-many relationship is working.
     *
     * @return void
     */
    public function test_requirement_is_connected_to_resource(): void
    {
        $requirement = BotwRequirement::factory()
            ->for(BotwResource::factory()->create())
            ->create();

        $this->assertModelExists($requirement->resource);
    }
}
