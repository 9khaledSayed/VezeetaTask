<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Faker\Generator as Faker;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()){
            $reservations = Reservation::get()->map(function ($reservation){
               return [
                 'doctor' => $reservation->doctor->name,
                 'customer' => $reservation->customer->name ,
                 'date' => $reservation->date ,
                 'time' => Carbon::createFromTimeString($reservation->time)->format('h:i A')  ,
               ];
            });
            return response()->json($reservations);
        }
        return view('reservations.index');
    }

    public function store(Request $request)
    {

        $this->authorize('make-reservation');
        $time = Carbon::createFromTimeString($request->time);

        if(Reservation::where([['date', '=',  $request->date], ['time', '=' ,  $time->format('H:i:s')]])->doesntExist()){
            Reservation::create([
                'doctor_id' => $request->doctor_id,
                'customer_id' => auth()->user()->id,
                'date' => $request->date,
                'time' => $time,
            ]);
        }else{
            return response()->json(['statue' => '0']);
        }
    }

}
