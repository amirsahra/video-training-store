<?php

namespace Modules\Authentication\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Authentication\Database\factories\UserFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'username', 'email', 'password'
    ];

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
