<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\ResourceCheckbox;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ResourceCheckboxTest extends TestCase
{
    /** @test */
    public function the_resource_checkbox_component_can_render()
    {
        $component = Livewire::test(ResourceCheckbox::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function passed_data_is_set_correctly()
    {
        $passedData = [
            "resourceName" => "Bokoblin Horn",
            "quantity" => 5,
            "pivotId" => 1,
        ];

        Livewire::test(ResourceCheckbox::class, $passedData)
            ->assertSet("resourceName", "Bokoblin Horn")
            ->assertSee("Bokoblin Horn")
            ->assertSet("quantity", 5)
            ->assertSee(5)
            ->assertSet("pivotId", 1)
            ->assertSee(1);
    }

    /** @test */
    public function clicking_checkbox_emits_event()
    {
        Livewire::test(ResourceCheckbox::class, ["pivotId" => 1])
            ->set("checked", true)
            ->call("checkboxClicked")
            ->assertEmitted("checkboxClicked");
    }
}
