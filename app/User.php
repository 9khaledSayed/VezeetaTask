<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guard = 'web';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
