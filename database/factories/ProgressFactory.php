<?php

namespace Database\Factories;

use App\Models\Progress;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progress>
 */
class ProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'task_id' => Task::factory(),
            'date' => fake()->date(),
            'employee' => User::factory()->hasAttached(Role::findByName('employee'), relationship: 'roles'),
            'time_taken' => fake()->numberBetween(1, 8),
            'status' => array_rand(Progress::status())
        ];
    }
}
