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
Auth::routes();
Route::get('/register/customer', 'Auth\RegisterController@showCustomerRegisterForm')->name('');
Route::post('/register/customer', 'Auth\RegisterController@createCustomer')->name('register.customer');
Route::post('/register/doctor', 'Auth\RegisterController@createDoctor')->name('register.doctor');


Route::middleware('auth:doctor,customer')->group(function (){
    Route::resource('/doctors', 'DoctorController')->except(['create', 'store', 'show', 'delete']);
    Route::resource('/reservations', 'ReservationController')->except(['create', 'show', 'delete']);
//    Route::get('/appointments/', 'DoctorController@appointments')->name('appointments.index');
    Route::get('/doctors/{doctor}/appointments', 'DoctorController@appointments');
});


Route::get('/', function () {
    $doctor = \App\Doctor::get()->first();
    return view('welcome', compact('doctor'));
});


Route::get('/home', 'HomeController@index')->name('home');

Route::get('foo', function (){
    Auth::logout();
    return redirect('/login');
});
