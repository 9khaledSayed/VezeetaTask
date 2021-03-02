<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/doctors', 'DoctorController');
Route::resource('/reservations', 'ReservationController');
Route::get('/appointments/', 'DoctorController@appointments')->name('appointments.index');


Route::get('/', function () {
    $doctor = \App\Doctor::get()->first();
    return view('welcome', compact('doctor'));
});
