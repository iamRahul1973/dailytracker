<?php

namespace Database\Seeders;

use App\Models\Progress;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dates = ['2022-08-01', '2022-08-02', '2022-08-03', '2022-08-04'];

        collect($dates)->each(function ($date) {
            Project::inRandomOrder()->take(5)->with('tasks')->get()->each(function ($project) use ($date) {
                Progress::factory()->for($project->tasks->random())->create(['date' => $date]);
            });
        });
    }
}
