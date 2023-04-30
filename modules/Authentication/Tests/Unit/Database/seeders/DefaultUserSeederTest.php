<?php

namespace Modules\Authentication\Tests\Unit\Database\seeders;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Modules\Authentication\Database\Seeders\SeedDefaultUserTableSeeder;
use Tests\TestCase;

class DefaultUserSeederTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateDefaultUserSuccess()
    {
        $this->seed(SeedDefaultUserTableSeeder::class);
        $this->assertDatabaseCount('users', 1);
    }

    public function testCreateDefaultUserWithConfigDataSuccess()
    {
        $this->seed(SeedDefaultUserTableSeeder::class);
        $defaultUser = Config::get('authentication.default_user');

        $this->assertDatabaseHas('users', [
            'username' => $defaultUser['username'],
            'email' => $defaultUser['email'],
        ]);
    }
}
