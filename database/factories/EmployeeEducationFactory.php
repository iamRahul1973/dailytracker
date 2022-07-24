<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeEducation>
 */
class EmployeeEducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'course' => Arr::random(['BCA', 'Bsc CS', 'B Tech', 'MCA', 'Msc CS', 'M Tech']),
            'college' => fake()->company(),
            'completed_on' => fake()->dateTimeThisDecade(),
            'percentage_of_marks' => fake()->numberBetween(30, 90),
        ];
    }
}
