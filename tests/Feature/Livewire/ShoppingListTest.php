<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ShoppingList;
use App\Models\Armor;
use App\Models\Requirement;
use App\Models\Resource;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
    public function shopping_list_received_checkbox_clicked_event()
    {
        $requirement = Requirement::factory()
            ->for(Armor::factory()->create())
            ->for(Resource::factory()->create())
            ->create();

        Livewire::test(ShoppingList::class)
            ->emit("checkboxClicked", true, $requirement->id)
            ->assertSee("{$requirement->quantity_needed} of {$requirement->resource->name}");
    }
}
