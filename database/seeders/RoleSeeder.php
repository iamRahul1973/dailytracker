<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'project manager'],
            ['name' => 'employee'],
            ['name' => 'frontend developer'],
            ['name' => 'backend developer'],
            ['name' => 'software tester'],
            ['name' => 'seo'],
            ['name' => 'graphic designer'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
