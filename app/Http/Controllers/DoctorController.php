<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        $doctor = Doctor::get()->first();
        return view('doctors.index', compact('doctor'));
    }


    public function edit(Doctor $doctor)
    {
        return view('doctors.edit', compact('doctor'));
    }


    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($this->validator($request));

        if(isset($request->photo)){
            $fileExtension = '.' . $request->file('photo')->getClientOriginalExtension();
            $fileName = date('mdYHis') . uniqid() . $fileExtension;
            $request->file('photo')->storeAs('public/avatars/', $fileName);
            $doctor->photo = $fileName;
            $doctor->save();
        }

        return redirect()->back()->with('success', 'true');
    }

    public function appointments(Request $request)
    {
        $date = Carbon::createFromFormat('Y-m-d', $request->date);
        $dayName = lcfirst($date->format('l'));
        $appointments = Doctor::get([$dayName, $dayName . '_from', $dayName . '_to', $dayName .'_period'])->first();
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



    public function validator(Request $request)
    {
        $request['saturday'] = $request->has('saturday');
        $request['sunday'] = $request->has('sunday');
        $request['monday'] = $request->has('monday');
        $request['tuesday'] = $request->has('tuesday');
        $request['wednesday'] = $request->has('wednesday');
        $request['thursday'] = $request->has('thursday');
        $request['friday'] = $request->has('friday');



        $rules = Doctor::$rules;
        return $request->validate($rules);
    }
}
