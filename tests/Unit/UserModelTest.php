<?php

namespace Tests\Unit;

use App\Models\Armor;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Makes sure the model is working.
     *
     * @return void
     */
    public function test_saves_user_model_to_database(): void
    {
        $user = User::factory()->create();

        $this->assertModelExists($user);
    }

    /**
     * Makes sure the armors many-to-many relationship is working.
     *
     * @return void
     */
    public function test_user_is_connected_to_armors_with_pivot(): void
    {
        $user = User::factory()
            ->has(Armor::factory()->count(3))
            ->create();

        $this->assertModelExists($user->armors->first());
        $this->assertDatabaseHas("armor_user", [
            "tracking_tier_start" => $user->armors->first()->pivot->tracking_tier_start,
            "tracking_tier_end" => $user->armors->first()->pivot->tracking_tier_end,
        ]);
    }

    /**
     * Makes sure the resources many-to-many relationship is working.
     *
     * @return void
     */
    public function test_user_is_connected_to_resources_with_pivot(): void
    {
        $user = User::factory()
            ->has(Resource::factory()->count(3))
            ->create();

        $this->assertModelExists($user->resources->first());
        $this->assertDatabaseHas("resource_user", [
            "quantity_owned" => $user->resources->first()->pivot->quantity_owned,
        ]);
    }
}
