<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\TierCheckbox;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TierCheckboxTest extends TestCase
{
    /** @test */
    public function the_tier_checkbox_component_can_render()
    {
        $component = Livewire::test(TierCheckbox::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function passed_data_is_set_correctly()
    {
        $passedData = [
            "armorName" => "Hylian Hood",
            "requirementIds" => collect([1]),
            "tierNum" => 1,
        ];

        Livewire::test(TierCheckbox::class, $passedData)
            ->assertSet("armorName", "Hylian Hood")
            ->assertSet("requirementIds", collect([1]))
            ->assertSet("tierNum", 1)
            ->assertSee(1);
    }

    /** @test */
    public function clicking_checkbox_emits_event()
    {
        Livewire::test(TierCheckbox::class, ["requirementIds" => collect([1])])
            ->set("checked", true)
            ->call("checkboxClicked")
            ->assertEmitted("checkboxClicked");
    }
}
