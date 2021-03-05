<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
