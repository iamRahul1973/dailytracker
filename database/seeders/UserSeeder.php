<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\EmployeeEducation;
use App\Models\EmployeeExperience;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        (User::factory()->create())->assignRole('admin');

        // Project Managers
        foreach (User::factory()->count(6)->create() as $manager) {
            $manager->assignRole('project manager');
        }

        // Employees
        foreach ($this->createEmployee(4) as $employee) {
            $employee->assignRole('employee', 'frontend developer');
        }

        foreach ($this->createEmployee(8) as $employee) {
            $employee->assignRole('employee', 'backend developer');
        }

        foreach ($this->createEmployee(2) as $employee) {
            $employee->assignRole('employee', 'software tester');
        }

        foreach ($this->createEmployee(2) as $employee) {
            $employee->assignRole('employee', 'seo');
        }

        foreach ($this->createEmployee(2) as $employee) {
            $employee->assignRole('employee', 'graphic designer');
        }
    }

    private function createEmployee($count)
    {
        return User::factory()->count($count)
            ->has(Employee::factory(), 'employeeDetails')
            ->has(EmployeeEducation::factory()->count(2), 'education')
            ->has(EmployeeExperience::factory()->count(3), 'experience')
            ->create();
    }
}
