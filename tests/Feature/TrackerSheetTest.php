<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class TrackerSheetTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guest_users_has_no_access()
    {
        $this->get('trackersheet')->assertRedirect('login');
    }

    /** @test */
    function trackersheet_livewire_component_exists()
    {
        $this->withoutExceptionHandling();

        Role::create(['name' => 'admin']);
        $john = User::factory()->create();
        $john->assignRole('admin');

        $this->actingAs($john)->get('trackersheet')->assertSeeLivewire('trackersheet');
    }
}
