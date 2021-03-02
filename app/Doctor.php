<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];

    public static $rules = [
        'name' => ['required', 'string:255'],
        'email' => 'sometimes|required|email',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg',
        "phone" => "required",
        "price" => "required",
        "specialization" => "required",
        "address" => "required",
        "*_from" => "required_if:saturday,true|before:*_to|exclude_if:saturday,false",
        "*_to" => "required_if:saturday,true|exclude_if:saturday,false",
        "*_period" => "required_if:saturday,true|exclude_if:saturday,false|numeric",
        "saturday" => "boolean",
        "sunday" => "boolean",
        "monday" => "boolean",
        "tuesday" => "boolean",
        "wednesday" => "boolean",
        "thursday" => "boolean",
        "friday" => "boolean",

    ];
}
