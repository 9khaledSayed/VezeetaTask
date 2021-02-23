<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [];

    public static $rules = [
        "saturday" => "boolean",
        "saturday_from" => "required_if:saturday,true|exclude_if:saturday,false",
        "saturday_to" => "required_if:saturday,true|exclude_if:saturday,false",
        "saturday_period" => "required_if:saturday,true|exclude_if:saturday,false|numeric",
        "sunday" => "boolean",
        "sunday_from" => "required_if:sunday,true|exclude_if:sunday,false",
        "sunday_to" => "required_if:sunday,true|exclude_if:sunday,false",
        "sunday_period" => "required_if:sunday,true|exclude_if:sunday,false|numeric",
        "monday" => "boolean",
        "monday_from" => "required_if:monday,true|exclude_if:monday,false",
        "monday_to" => "required_if:monday,true|exclude_if:monday,false",
        "monday_period" => "required_if:monday,true|exclude_if:monday,false|numeric",
        "tuesday" => "boolean",
        "tuesday_from" => "required_if:tuesday,true|exclude_if:tuesday,false",
        "tuesday_to" => "required_if:tuesday,true|exclude_if:tuesday,false",
        "tuesday_period" => "required_if:tuesday,true|exclude_if:tuesday,false|numeric",
        "wednesday" => "boolean",
        "wednesday_from" => "required_if:wednesday,true|exclude_if:wednesday,false",
        "wednesday_to" => "required_if:wednesday,true|exclude_if:wednesday,false",
        "wednesday_period" => "required_if:wednesday,true|exclude_if:wednesday,false|numeric",
        "thursday" => "boolean",
        "thursday_from" => "required_if:thursday,true|exclude_if:thursday,false",
        "thursday_to" => "required_if:thursday,true|exclude_if:thursday,false",
        "thursday_period" => "required_if:thursday,true|exclude_if:thursday,false|numeric",
        "friday" => "boolean",
        "friday_from" => "required_if:friday,true|exclude_if:friday,false",
        "friday_to" => "required_if:friday,true|exclude_if:friday,false",
        "friday_period" => "required_if:friday,true|exclude_if:friday,false|numeric",
    ];

    public function setDoctorIdAttribute($value)
    {
        $this->attributes['doctor_id'] = 1;
    }

    public function setSaturdayFromAttribute($value)
    {
        $this->attributes['saturday_from'] =  Carbon::createFromTimeString($value);
    }
    public function setSaturdayToAttribute($value)
    {
        $this->attributes['saturday_to'] =  Carbon::createFromTimeString($value);
    }

    public function setSundayFromAttribute($value)
    {
        $this->attributes['sunday_from'] =  Carbon::createFromTimeString($value);
    }
    public function setSundayToAttribute($value)
    {
        $this->attributes['sunday_to'] =  Carbon::createFromTimeString($value);
    }

    public function setMondayFromAttribute($value)
    {
        $this->attributes['monday_from'] =  Carbon::createFromTimeString($value);
    }
    public function setMondayToAttribute($value)
    {
        $this->attributes['monday_to'] =  Carbon::createFromTimeString($value);
    }

    public function setTuesdayFromAttribute($value)
    {
        $this->attributes['tuesday_from'] =  Carbon::createFromTimeString($value);
    }
    public function setTuesdayToAttribute($value)
    {
        $this->attributes['tuesday_to'] =  Carbon::createFromTimeString($value);
    }

    public function setWednesdayFromAttribute($value)
    {
        $this->attributes['wednesday_from'] =  Carbon::createFromTimeString($value);
    }
    public function setWednesdayToAttribute($value)
    {
        $this->attributes['wednesday_to'] =  Carbon::createFromTimeString($value);
    }

    public function setThursdayFromAttribute($value)
    {
        $this->attributes['thursday_from'] =  Carbon::createFromTimeString($value);
    }
    public function setThursdayToAttribute($value)
    {
        $this->attributes['thursday_to'] =  Carbon::createFromTimeString($value);
    }

    public function setFridayFromAttribute($value)
    {
        $this->attributes['Friday_from'] =  Carbon::createFromTimeString($value);
    }
    public function setFridayToAttribute($value)
    {
        $this->attributes['Friday_to'] =  Carbon::createFromTimeString($value);
    }
}
