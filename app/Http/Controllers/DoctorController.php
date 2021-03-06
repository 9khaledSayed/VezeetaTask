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
        $doctor->update($this->validator($request, $doctor->id));

        return redirect()->back()->with('success', 'true');
    }

    public function appointments(Doctor $doctor, Request $request)
    {
        $cards = [];
        if(isset($request->next_to)){
            $nextTo = Carbon::createFromFormat('Y-m-d', $request->next_to);

            for ($i = 1; $i <= 3; $i++){
                $nextTo->addDays(1);
                $doctor->generateAppointment($cards, $nextTo);
            }

        }elseif (isset($request->previous_to)){
            $previousTo = Carbon::createFromFormat('Y-m-d', $request->previous_to);

            for ($i = 1; $i <= 3; $i++){
                $previousTo->subDays(1);
                $doctor->generateAppointment($cards, $previousTo);
            }

            $cards = array_reverse($cards);
        }

        return response()->json($cards);
    }



    public function validator(Request $request, $id)
    {
        $request['saturday'] = $request->has('saturday');
        $request['sunday'] = $request->has('sunday');
        $request['monday'] = $request->has('monday');
        $request['tuesday'] = $request->has('tuesday');
        $request['wednesday'] = $request->has('wednesday');
        $request['thursday'] = $request->has('thursday');
        $request['friday'] = $request->has('friday');



        $rules = Doctor::$rules;
        $rules['email'] = ($rules['email'] . ',email,' . $id);
        unset($rules['password']);
        return $request->validate($rules);
    }
}
