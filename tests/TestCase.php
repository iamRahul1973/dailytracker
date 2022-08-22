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

    protected static function createUser($roles)
    {
        if (is_array($roles)) {
            return array_map(fn ($role) => self::createUser($role), $roles);
        }

        ($user = User::factory()->create())->assignRole($roles);
        return $user;
    }
}
