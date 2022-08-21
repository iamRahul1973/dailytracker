<?php

namespace Tests;

use App\Models\User;
use Database\Seeders\RolesAndPermissionsSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $seed = true;
    protected $seeder = RolesAndPermissionsSeeder::class;

    protected static function createUser($role)
    {
        ($user = User::factory()->create())->assignRole($role);
        return $user;
    }
}
