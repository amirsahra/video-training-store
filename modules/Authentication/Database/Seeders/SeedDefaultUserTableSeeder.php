<?php

namespace Modules\Authentication\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Modules\Authentication\Entities\User;

class SeedDefaultUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->insertDefaultUser();
    }

    private function insertDefaultUser(): void
    {
        $defaultUser = Config::get('authentication.default_user');
        User::create([
            'username' => $defaultUser['username'],
            'email' => $defaultUser['email'],
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($defaultUser['password'])
        ]);
    }
}
