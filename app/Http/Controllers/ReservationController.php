<?php

namespace App\Http\Controllers;

use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        return view('reservations.create');
    }


    public function store(Request $request)
    {
        $time = Carbon::createFromTimeString($request->time);
        if(Reservation::where([['date', '=',  $request->date], ['time', '=' ,  $time]])->doesntExist()){
            Reservation::create([
                'user_name' => 'khaled Sayed',
                'date' => $request->date,
                'time' => $time,
            ]);
        }else{
            return response()->json(['statue' => '0']);
        }
    }


    public function show(Reservation $reservation)
    {
        //
    }


    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
