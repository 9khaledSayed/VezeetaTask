<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];

    public static $rules = [
        'name' => ['required', 'string:191'],
        'email' => 'sometimes|required|email',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg',
        "phone" => "required|numeric",
        "price" => "required|numeric|min:0",
        "specialization" => "required",
        "address" => "required",
        "saturday" => "boolean",
        "saturday_from" => "required_if:saturday,true|exclude_if:saturday,false|before:saturday_to",
        "saturday_to" => "required_if:saturday,true|exclude_if:saturday,false",
        "saturday_period" => "required_if:saturday,true|exclude_if:saturday,false|numeric",
        "sunday" => "boolean",
        "sunday_from" => "required_if:sunday,true|exclude_if:sunday,false|before:sunday_to",
        "sunday_to" => "required_if:sunday,true|exclude_if:sunday,false",
        "sunday_period" => "required_if:sunday,true|exclude_if:sunday,false|numeric",
        "monday" => "boolean",
        "monday_from" => "required_if:monday,true|exclude_if:monday,false|before:monday_to",
        "monday_to" => "required_if:monday,true|exclude_if:monday,false",
        "monday_period" => "required_if:monday,true|exclude_if:monday,false|numeric",
        "tuesday" => "boolean",
        "tuesday_from" => "required_if:tuesday,true|exclude_if:tuesday,false|before:tuesday_to",
        "tuesday_to" => "required_if:tuesday,true|exclude_if:tuesday,false",
        "tuesday_period" => "required_if:tuesday,true|exclude_if:tuesday,false|numeric",
        "wednesday" => "boolean",
        "wednesday_from" => "required_if:wednesday,true|exclude_if:wednesday,false|before:wednesday_to",
        "wednesday_to" => "required_if:wednesday,true|exclude_if:wednesday,false",
        "wednesday_period" => "required_if:wednesday,true|exclude_if:wednesday,false|numeric",
        "thursday" => "boolean",
        "thursday_from" => "required_if:thursday,true|exclude_if:thursday,false|before:thursday_to",
        "thursday_to" => "required_if:thursday,true|exclude_if:thursday,false",
        "thursday_period" => "required_if:thursday,true|exclude_if:thursday,false|numeric",
        "friday" => "boolean",
        "friday_from" => "required_if:friday,true|exclude_if:friday,false|before:friday_to",
        "friday_to" => "required_if:friday,true|exclude_if:friday,false",
        "friday_period" => "required_if:friday,true|exclude_if:friday,false|numeric",
    ];
}
