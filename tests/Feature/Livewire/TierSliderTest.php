<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\TierSlider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TierSliderTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(TierSlider::class, ["armorId" => 4]);

        $component->assertStatus(200);
    }
}
