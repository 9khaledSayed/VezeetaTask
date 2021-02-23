<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function index(Request $request)
    {
        $date = Carbon::createFromFormat('Y-m-d', $request->date);
        $dayName = lcfirst($date->format('l'));
        $appointments = Appointment::get([$dayName, $dayName . '_from', $dayName . '_to', $dayName .'_period'])->first();
        $timeIntervals = [];
        if($appointments->{$dayName}){

            $startTime = Carbon::createFromTimeString($appointments->{$dayName . '_from'});
            $endTime = Carbon::createFromTimeString($appointments->{$dayName . '_to'});
            $period = $appointments->{$dayName .'_period'};

            while ($startTime->lte($endTime)){
                array_push($timeIntervals, [
                   'interval' =>  $startTime->format('h:i A'),
                   'available' =>  Reservation::where([['date', '=',  $request->date], ['time', '=' ,  $startTime]])->doesntExist(),
                ]);
                $startTime->addMinutes($period);
            }
        }
        return response()->json($timeIntervals);

//        $reservations = Reservation::whereDate('date', $request->date)->get();
    }


    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        Appointment::create($this->validator($request));
        return redirect()->back();
    }

    public function validator(Request $request)
    {
        $request['saturday'] = $request->has('saturday');
        $request['sunday'] = $request->has('sunday');
        $request['monday'] = $request->has('monday');
        $request['tuesday'] = $request->has('tuesday');
        $request['wednesday'] = $request->has('wednesday');
        $request['thursday'] = $request->has('thursday');
        $request['friday'] = $request->has('friday');

        $rules = Appointment::$rules;
        return $request->validate($rules);
    }
}
