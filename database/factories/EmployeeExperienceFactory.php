<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeExperience>
 */
class EmployeeExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company' => fake()->company(),
            'address' => fake()->address(),
            'span' => '2011 April to 2012 June',
            'role' => fake()->jobTitle(),
            'ctc' => fake()->numberBetween(100000, 900000)
        ];
    }
}
