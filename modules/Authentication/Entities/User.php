<?php

namespace Modules\Authentication\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'username', 'email', 'password'
    ];

    protected static function newFactory()
    {
        //return \Modules\Authentication\Database\factories\UserFactory::new();
    }
}
