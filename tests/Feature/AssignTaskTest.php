<?php

namespace Tests\Feature;

use App\Http\Livewire\AssignTask;
use App\Http\Livewire\Trackersheet;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AssignTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function component_is_present_only_for_admin_and_managers()
    {
        $this->seed(RolesAndPermissionsSeeder::class);
        $admin = self::createUser('admin');
        $projectManager = self::createUser('project manager');
        $developer = self::createUser('employee');

        /** @var \Illuminate\Contracts\Auth\Authenticatable $admin */
        $this->actingAs($admin)->get(route('trackersheet'))->assertSeeLivewire('trackersheet');

        /** @var \Illuminate\Contracts\Auth\Authenticatable $projectManager */
        $this->actingAs($projectManager)->get(route('trackersheet'))->assertSeeLivewire('trackersheet');

        /** @var \Illuminate\Contracts\Auth\Authenticatable $developer */
        $this->actingAs($developer)->get(route('trackersheet'))->assertDontSeeLivewire('assign-task');
    }

    /** @test */
    function task_can_be_assigned()
    {
        $this->seed(RolesAndPermissionsSeeder::class);
        $admin = self::createUser('admin');
        $developer =self::createUser('employee');
        $project = Project::factory()->create(['name' => 'Zeetorm']);
        $task = Task::factory()->for($project)->create(['name' => 'Authentication']);

        $trackerSheetComponent = Livewire::actingAs($admin)->test(Trackersheet::class);
        
        $trackerSheetComponent->assertDontSee('Zeetorm')
            ->assertDontSee('Authentication');

        Livewire::actingAs($admin)
            ->test(AssignTask::class)
            ->set('project', $project->id)
            ->set('task', $task->id)
            ->set('developer', $developer->id)
            ->set('note', 'High Priority')
            ->call('save')
            ->assertEmitted('taskAssigned')
            ->assertDispatchedBrowserEvent('close-assign-task-modal')
            ->assertDispatchedBrowserEvent('toastr');
        
        $trackerSheetComponent->emit('taskAssigned')
            ->assertSee('Zeetorm')
            ->assertSee('Authentication');
        
        $this->assertDatabaseHas('progress', [
            'task_id' => $task->id,
            'date' => now()->format('Y-m-d'),
            'employee' => $developer->id,
            'remarks' => 'High Priority'
        ]);
    }

    /** @test */
    function project_manager_can_only_assign_tasks_of_the_projects_he_manages()
    {
        $this->seed(RolesAndPermissionsSeeder::class);
        $manager = self::createUser('project manager');

        $projectHeOwns = Project::factory()->for($manager, 'manager')->create();
        $projectHeDoesntOwn = Project::factory()->create();

        Livewire::actingAs($manager)
            ->test(AssignTask::class)
            ->assertSee(str($projectHeOwns->name)->headline())
            ->assertDontSee(str($projectHeDoesntOwn->name)->headline());
    }

    /** @test */
    function task_can_be_assigned_only_to_one_of_its_squad_member()
    {
        $this->seed(RolesAndPermissionsSeeder::class);
        $manager = self::createUser('project manager');
        $roleEmployee = Role::findByName('employee');

        $rahul = User::factory()
            ->hasAttached($roleEmployee, relationship: 'roles')
            ->state(['first_name' => 'Rahul', 'last_name' => 'K']);

        $sreenath = User::factory()
            ->hasAttached($roleEmployee, relationship: 'roles')
            ->state(['first_name' => 'Sreenath', 'last_name' => 'Sahadevan']);

        $cloudims = Project::factory()->for($manager, 'manager')->has($rahul, 'members')->create();
        $billing = Project::factory()->for($manager, 'manager')->has($sreenath, 'members')->create();

        Livewire::actingAs($manager)
            ->test(AssignTask::class)
            ->set('project', $cloudims->id)
            ->assertSee('Rahul K')
            ->assertDontSee('Sreenath Sahadevan')
            ->set('project', $billing->id)
            ->assertSee('Sreenath Sahadevan')
            ->assertDontSee('Rahul K');
    }

    private static function createUser($role)
    {
        ($admin = User::factory()->create())->assignRole($role);
        return $admin;
    }
}
