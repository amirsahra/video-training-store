<?php

namespace Modules\Authentication\Database\factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Authentication\Entities\User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => str_replace([' ', '.'], '_', $this->faker->unique()->userName()),
            'email' => $this->faker->unique()->email(),
            'password' => Hash::make('123456789'),
            'email_verified_at' => Carbon::now()
        ];
    }
}

