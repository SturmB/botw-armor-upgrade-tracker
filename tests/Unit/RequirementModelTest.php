<?php

namespace Tests\Unit;

use App\Models\Armor;
use App\Models\Requirement;
use App\Models\Resource;
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
        $requirement = Requirement::factory()->create();

        $this->assertModelExists($requirement);
    }

    /**
     * Makes sure the armor one-to-many relationship is working.
     *
     * @return void
     */
    public function test_requirement_is_connected_to_armor(): void
    {
        $requirement = Requirement::factory()
            ->for(Armor::factory()->create())
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
        $requirement = Requirement::factory()
            ->for(Resource::factory()->create())
            ->create();

        $this->assertModelExists($requirement->resource);
    }
}
