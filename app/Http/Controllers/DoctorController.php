<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('');
//    }

    public function index()
    {
        $doctors = Doctor::get();
        return view('doctors.index', compact('doctors'));
    }


    public function edit(Doctor $doctor)
    {
        $this->authorize('update-doctor-information');
        return view('doctors.edit', compact('doctor'));
    }


    public function update(Request $request, Doctor $doctor)
    {
        $this->authorize('update-doctor-information');
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

    public function appointments(Doctor $doctor, Request $request)
    {
//        $this->authorize('make-reservation');
        $cards = [];
        if(isset($request->next_to)){
            $nextTo = Carbon::createFromFormat('Y-m-d', $request->next_to);
            for ($i = 1; $i <= 3; $i++){
                $nextTo->addDays(1);
                $dateFormat = $nextTo->format('l d/m');

                $dayName = lcfirst($nextTo->format('l'));
                $appointments = [];
                if($doctor->{$dayName}){

                    $startTime = Carbon::createFromTimeString($doctor->{$dayName . '_from'});
                    $endTime = Carbon::createFromTimeString($doctor->{$dayName . '_to'});
                    $period = $doctor->{$dayName .'_period'};

                    while ($startTime->lte($endTime)){
                        array_push($appointments, [
                            'interval' =>  $startTime->format('h:i A'),
                            'available' =>  Reservation::where([['date', '=',  $nextTo->format('Y-m-d')], ['time', '=' ,  $startTime]])->doesntExist(),
                        ]);
                        $startTime->addMinutes($period);
                    }
                }

                if($nextTo->format('Y-m-d') == Carbon::today()->format('Y-m-d')){
                    $dateFormat = 'Today';
                }elseif ($nextTo->format('Y-m-d') == Carbon::tomorrow()->format('Y-m-d')){
                    $dateFormat = 'Tomorrow';
                }

                array_push($cards, [
                    'doctor_id' => $doctor->id,
                    'date_format' => $dateFormat,
                    'date_value' => $nextTo->format('Y-m-d'),
                    'appointments_list' => $appointments
                ]);
            }
        }elseif (isset($request->previous_to)){
            $previousTo = Carbon::createFromFormat('Y-m-d', $request->previous_to);
            for ($i = 1; $i <= 3; $i++){
                $previousTo->subDays(1);
                $dateFormat = $previousTo->format('l d/m');
                $dayName = lcfirst($previousTo->format('l'));
                $appointments = [];
                if($doctor->{$dayName}){

                    $startTime = Carbon::createFromTimeString($doctor->{$dayName . '_from'});
                    $endTime = Carbon::createFromTimeString($doctor->{$dayName . '_to'});
                    $period = $doctor->{$dayName .'_period'};

                    while ($startTime->lte($endTime)){
                        array_push($appointments, [
                            'interval' =>  $startTime->format('h:i A'),
                            'available' =>  Reservation::where([['date', '=',  $previousTo->format('Y-m-d')], ['time', '=' ,  $startTime->format('H:i:s')]])->doesntExist(),
                        ]);
                        $startTime->addMinutes($period);
                    }
                }

                if($previousTo->format('Y-m-d') == Carbon::today()->format('Y-m-d')){
                    $dateFormat = 'Today';
                }elseif ($previousTo->format('Y-m-d') == Carbon::tomorrow()->format('Y-m-d')){
                    $dateFormat = 'Tomorrow';
                }

                array_push($cards, [
                    'doctor_id' => $doctor->id,
                    'date_format' => $dateFormat,
                    'date_value' => $previousTo->format('Y-m-d'),
                    'appointments_list' => $appointments
                ]);
            }
            $cards = array_reverse($cards);
        }





        return response()->json($cards);
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
        unset($rules['password']);
        return $request->validate($rules);
    }
}
