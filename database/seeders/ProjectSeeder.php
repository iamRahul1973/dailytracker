<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory()
            ->for(User::role('project manager')->inRandomOrder()->first(), 'manager')
            ->hasAttached(Technology::inRandomOrder()->get()->take(2), relationship: 'technologies')
            ->hasAttached(User::inRandomOrder()->get()->take(3), relationship: 'members')
            ->has(Task::factory()->count(3))
            ->count(8)
            ->create();
    }
}
