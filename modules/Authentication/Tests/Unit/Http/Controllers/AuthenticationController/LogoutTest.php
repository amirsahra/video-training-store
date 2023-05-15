<?php

namespace Modules\Authentication\Tests\Unit\Http\Controllers\AuthenticationController;

use Modules\Authentication\Entities\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function testLogoutUserSuccess(): void
    {
        $user = User::factory()->make();
        $this->be($user); // login your user in system

        $this->get(route('logout'))
            ->assertRedirect(route('home')); // redirect to login,
        $this->assertGuest(); // check that your user not auth more
    }
}
