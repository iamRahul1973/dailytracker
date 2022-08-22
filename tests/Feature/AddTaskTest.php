<?php

namespace Tests\Feature;

use App\Http\Livewire\AddTask;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire;
use Tests\TestCase;

class AddTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function component_is_present_for_admin_and_managers_only()
    {
        [$admin, $manager, $employee] = $this->createUser(['admin', 'project manager', 'employee']);

        $this->actingAs($admin)->get(route('trackersheet'))->assertSeeLivewire('add-task');
        $this->actingAs($manager)->get(route('trackersheet'))->assertSeeLivewire('add-task');
        $this->actingAs($employee)->get(route('trackersheet'))->assertDontSeeLivewire('add-task');
    }

    /** @test */
    function task_can_be_added()
    {
        $project = Project::factory()->create();

        $component = Livewire::actingAs(self::createUser('admin'))->test(AddTask::class);
        
        $component->set('task.project_id', $project->id)
            ->set('task.name', 'Authentication')
            ->set('task.description', 'This is the description')
            ->set('task.estimated', '120')
            ->call('save')
            ->assertDispatchedBrowserEvent('close-add-task-modal')
            ->assertDispatchedBrowserEvent('toastr')
            ->assertEmitted('newTaskAdded');
        
        $this->assertDatabaseCount('tasks', 1);
        $this->assertDatabaseHas('tasks', [
            'project_id' => $project->id,
            'name' => 'Authentication',
            'description' => 'This is the description',
            'estimated' => '120'
        ]);

        $component->set('task.project_id', $project->id)
            ->set('task.name', 'Forgot Password')
            ->set('task.description', 'This is the description')
            ->set('task.estimated', '150')
            ->call('save');
        
        $this->assertDatabaseCount('tasks', 2);
    }
}
