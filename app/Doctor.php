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
        "phone" => "required|numeric|regex:/(01)[0-9]{9}/",
        "price" => "required|numeric|min:0",
        "specialization" => "required",
        "address" => "required",
        "saturday" => "boolean",
        "saturday_from" => "required_if:saturday,true|before:saturday_to",
        "saturday_to" => "required_if:saturday,true",
        "saturday_period" => "required_if:saturday,true|numeric",
        "sunday" => "boolean",
        "sunday_from" => "required_if:sunday,true|before:sunday_to",
        "sunday_to" => "required_if:sunday,true",
        "sunday_period" => "required_if:sunday,true|numeric",
        "monday" => "boolean",
        "monday_from" => "required_if:monday,true|before:monday_to",
        "monday_to" => "required_if:monday,true",
        "monday_period" => "required_if:monday,true|numeric",
        "tuesday" => "boolean",
        "tuesday_from" => "required_if:tuesday,true|before:tuesday_to",
        "tuesday_to" => "required_if:tuesday,true",
        "tuesday_period" => "required_if:tuesday,true|numeric",
        "wednesday" => "boolean",
        "wednesday_from" => "required_if:wednesday,true|before:wednesday_to",
        "wednesday_to" => "required_if:wednesday,true",
        "wednesday_period" => "required_if:wednesday,true|numeric",
        "thursday" => "boolean",
        "thursday_from" => "required_if:thursday,true|before:thursday_to",
        "thursday_to" => "required_if:thursday,true",
        "thursday_period" => "required_if:thursday,true|numeric",
        "friday" => "boolean",
        "friday_from" => "required_if:friday,true|before:friday_to",
        "friday_to" => "required_if:friday,true",
        "friday_period" => "required_if:friday,true|numeric",
    ];
}
