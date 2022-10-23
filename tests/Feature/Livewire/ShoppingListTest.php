<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ShoppingList;
use App\Models\Armor;
use App\Models\Requirement;
use App\Models\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ShoppingListTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_shopping_list_component_can_render()
    {
        $component = Livewire::test(ShoppingList::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function home_page_contains_shopping_list_component()
    {
        $this->get("/")->assertSeeLivewire(ShoppingList::class);
    }

    /** @test */
    public function shopping_list_received_update_shopping_list_event()
    {
        $requirement = Requirement::factory()
            ->for(Armor::factory()->create())
            ->for(Resource::factory()->create())
            ->create();
        $passedData = [
            $requirement->armor->id => [
                "minTier" => $requirement->tier,
                "maxTier" => $requirement->tier,
            ],
        ];

        Livewire::test(ShoppingList::class)
            ->emit("updateShoppingList", $passedData)
            ->assertSee($requirement->quantity_needed)
            ->assertSee($requirement->resource->name);
    }

    /** @test */
    public function shopping_list_shows_combined_quantities()
    {
        $resources = Resource::factory(4)
            ->sequence(
                ["name" => "Amber"],
                ["name" => "Bokoblin Horn"],
                ["name" => "Bokoblin Fang"],
                ["name" => "Bokoblin Guts"],
            )
            ->create();
        $requirements = Requirement::factory(7)
            ->for(Armor::factory()->create())
            ->sequence(
                [
                    "tier" => 1,
                    "resource_id" => $resources
                        ->where("name", "Bokoblin Horn")
                        ->first()->id,
                ],
                [
                    "tier" => 2,
                    "resource_id" => $resources
                        ->where("name", "Bokoblin Horn")
                        ->first()->id,
                ],
                [
                    "tier" => 2,
                    "resource_id" => $resources
                        ->where("name", "Bokoblin Fang")
                        ->first()->id,
                ],
                [
                    "tier" => 3,
                    "resource_id" => $resources
                        ->where("name", "Bokoblin Fang")
                        ->first()->id,
                ],
                [
                    "tier" => 3,
                    "resource_id" => $resources
                        ->where("name", "Bokoblin Guts")
                        ->first()->id,
                ],
                [
                    "tier" => 4,
                    "resource_id" => $resources
                        ->where("name", "Bokoblin Guts")
                        ->first()->id,
                ],
                [
                    "tier" => 4,
                    "resource_id" => $resources->where("name", "Amber")->first()
                        ->id,
                ],
            )
            ->create();

        $passedData = [
            $requirements[0]->armor->id => [
                "minTier" => 1,
                "maxTier" => 3,
            ],
        ];

        $totalHornQuantity = $requirements
            ->where("resource.name", "Bokoblin Horn")
            ->pluck("quantity_needed")
            ->sum();
        $totalFangQuantity = $requirements
            ->where("resource.name", "Bokoblin Fang")
            ->pluck("quantity_needed")
            ->sum();
        $totalGutsQuantity = $requirements
            ->where(["resource.name" => "Bokoblin Guts", "tier" => 3])
            ->pluck("quantity_needed")
            ->sum();

        Livewire::test(ShoppingList::class)
            ->emit("updateShoppingList", $passedData)
            ->assertSee($totalHornQuantity)
            ->assertSee($requirements[0]->resource->name)
            ->assertSee($totalFangQuantity)
            ->assertSee($requirements[2]->resource->name)
            ->assertSee($totalGutsQuantity)
            ->assertSee($requirements[4]->resource->name);
    }
}
