<?php

namespace Modules\Authentication\Tests\Unit\Database;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Authentication\Entities\User;
use Tests\TestCase;

class UserFactoryTest extends TestCase
{
    use RefreshDatabase;
    public function testCreateUserWithFactorySuccess()
    {
        $user = User::factory()->create();
        $this->assertNotEmpty($user);
    }
}
