<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Customer extends Authenticatable
{
    protected $guard = 'customer';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => ['required', 'string', 'max:191'],
        'email' => ['required', 'string', 'email', 'max:191', 'unique:customers'],
        "phone" => "required|numeric|regex:/(01)[0-9]{9}/",
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
