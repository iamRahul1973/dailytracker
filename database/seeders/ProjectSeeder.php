<?php

namespace Database\Seeders;

use App\Models\Project;
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
        for ($i=0; $i < 1; $i++) {
            $manager = User::role('project manager')->inRandomOrder()->first();
            $technologies = Technology::inRandomOrder()->get()->take(2);
            $members = User::inRandomOrder()->get()->take(3);

            Project::factory()
                ->hasAttached($technologies, relationship: 'technologies')
                ->hasAttached($members, relationship: 'members')
                ->create(['manager' => $manager->id]);
        }
    }
}
