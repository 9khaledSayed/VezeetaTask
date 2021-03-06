<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Doctor extends Authenticatable
{

    protected $guard = 'doctor';

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => ['required', 'string:191'],
        'email' => 'sometimes|required|email|unique:doctors',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg',
        "phone" => "required|numeric|regex:/(01)[0-9]{9}/",
        "price" => "required|numeric|min:0",
        "specialization" => "required",
        "password" => ['required', 'string', 'min:8', 'confirmed'],

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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function initialCards()
    {
        $cards = [];
        $today = Carbon::today();
        $x = 0;
        for ($i = 0; $i <= 2; $i++){
            $today->addDays($x);
            $this->generateAppointment($cards, $today);
            $x = 1;
        }

        return $cards;
    }

    public function generateAppointment(&$cards, $date)
    {
        $dateFormat = $date->format('l d/m');
        $dayName = lcfirst($date->format('l'));
        $appointments = [];
        if($this->{$dayName}){

            $startTime = Carbon::createFromTimeString($this->{$dayName . '_from'});
            $endTime = Carbon::createFromTimeString($this->{$dayName . '_to'});
            $period = $this->{$dayName .'_period'};

            while ($startTime->lte($endTime)){
                array_push($appointments, [
                    'interval' =>  $startTime->format('h:i A'),
                    'available' =>  Reservation::where([['doctor_id', '=', $this->id], ['date', '=',  $date->format('Y-m-d')], ['time', '=' ,  $startTime->format('H:i:s')]])->doesntExist(),
                ]);
                $startTime->addMinutes($period);
            }
        }

        if($date->format('Y-m-d') == Carbon::today()->format('Y-m-d')){
            $dateFormat = 'Today';
        }elseif ($date->format('Y-m-d') == Carbon::tomorrow()->format('Y-m-d')){
            $dateFormat = 'Tomorrow';
        }

        array_push($cards, [
            'doctor_id' => $this->id,
            'date_format' => $dateFormat,
            'date_value' => $date->format('Y-m-d'),
            'appointments_list' => $appointments
        ]);
    }
}
