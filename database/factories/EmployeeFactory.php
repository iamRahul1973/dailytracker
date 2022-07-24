<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'guardain_name' => fake()->firstNameMale(),
            'guardian_relation' => 'father',
            'guardian_email' => fake()->freeEmail(),
            'guardian_phone' => fake()->numberBetween(9946000000, 9946999999),
            'resume' => 'https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf',
            'married' => fake()->boolean(),
            'joined_on' => fake()->dateTimeThisYear(),
        ];
    }
}
