<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'assign task']);
        Permission::create(['name' => 'add task']);

        $roles = collect(self::getRoles())->map(fn ($role) => ['name' => $role, 'guard_name' => 'web']);
        Role::insert($roles->toArray());

        $admin = Role::findByName('admin');
        $admin->givePermissionTo(Permission::all());

        $projectManager = Role::findByName('project manager');
        $projectManager->givePermissionTo(['assign task', 'add task']);
    }

    private static function getRoles()
    {
        return [
            'admin',
            'project manager',
            'employee',
            'frontend developer',
            'backend developer',
            'software tester',
            'seo',
            'graphic designer'
        ];
    }
}
