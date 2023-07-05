<?php

namespace Tests\Unit;

use App\Models\BotwArmor;
use App\Models\BotwArmorSet;
use App\Models\BotwRequirement;
use App\Models\BotwResource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArmorModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Makes sure the model is working.
     *
     * @return void
     */
    public function test_saves_armor_model_to_database(): void
    {
        $armor = BotwArmor::factory()->create();

        $this->assertModelExists($armor);
    }

    /**
     * Makes sure the armor set one-to-many relationship is working.
     *
     * @return void
     */
    public function test_armor_is_connected_to_armor_set(): void
    {
        $armor = BotwArmor::factory()
            ->for(BotwArmorSet::factory()->create())
            ->create();

        $this->assertModelExists($armor->armorSet);
    }

    /**
     * Makes sure the resources many-to-many relationship is working.
     *
     * @return void
     */
    public function test_armor_is_connected_to_resources_with_pivot(): void
    {
        $armor = BotwArmor::factory()
            ->hasAttached(BotwResource::factory()->count(3), [
                "tier" => fake()->numberBetween(1, 4),
                "quantity_needed" => fake()->numberBetween(1, 50),
            ])
            ->create();

        $this->assertModelExists($armor->resources->first());
        $this->assertModelExists($armor->resources->first()->pivot);
    }

    /**
     * Makes sure the users many-to-many relationship is working.
     *
     * @return void
     */
    public function test_armor_is_connected_to_users_with_pivot(): void
    {
        $armor = BotwArmor::factory()
            ->has(User::factory()->count(3))
            ->create();

        $this->assertModelExists($armor->users->first());
        $this->assertDatabaseHas("armor_user", [
            "tracking_tier_start" => $armor->users->first()->pivot->tracking_tier_start,
            "tracking_tier_end" => $armor->users->first()->pivot->tracking_tier_end,
        ]);
    }

    /**
     * Makes sure the requirements one-to-many relationship is working.
     *
     * @return void
     */
    public function test_armor_is_connnected_to_requirements(): void
    {
        $armor = BotwArmor::factory()
            ->has(BotwRequirement::factory()->count(3))
            ->create();

        $this->assertModelExists($armor->requirements->first());
    }
}
