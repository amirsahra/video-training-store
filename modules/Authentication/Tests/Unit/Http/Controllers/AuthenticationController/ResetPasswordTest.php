<?php

namespace Modules\Authentication\Tests\Unit\Http\Controllers\AuthenticationController;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Modules\Authentication\Entities\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    const ROUTE_PASSWORD_EMAIL = 'password.email';
    const ROUTE_PASSWORD_REQUEST = 'password.request';
    const ROUTE_PASSWORD_RESET = 'password.reset';
    const ROUTE_PASSWORD_RESET_SUBMIT = 'password.reset.submit';
    const USER_ORIGINAL_PASSWORD = 'secret';

    public function test__construct()
    {
        parent::setUp();
        Notification::fake();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRestPasswordUrlMustHaveTheCorrectFormat()
    {
        $user = User::factory()->create();
        $token = Password::broker()->createToken($user);
        $response = $this->get(route(self::ROUTE_PASSWORD_RESET, [
            'token' => $token,
        ]));
        $response
            ->assertSee('Reset Password')
            ->assertSee('Password');
        $response->assertStatus(200);
    }
}
