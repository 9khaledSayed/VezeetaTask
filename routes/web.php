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

Route::get('/doctors', 'DoctorController@index')->name('doctors.index');
Route::get('/reservations/create', 'ReservationController@create')->name('reservations.create');
Route::post('/reservations/', 'ReservationController@store')->name('reservations.store');
Route::get('/appointments/', 'AppointmentController@index')->name('appointments.index');
Route::get('/appointments/create', 'AppointmentController@create')->name('appointments.create');
Route::post('/appointments/', 'AppointmentController@store')->name('appointments.store');

Route::get('/', function () {
    return view('welcome');
});
