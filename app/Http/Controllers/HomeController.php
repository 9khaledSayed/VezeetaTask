<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:customer,doctor');
    }


    public function index()
    {
        if(Auth::guard('doctor')->check()){
            return  redirect(route('doctors.edit', \auth()->user()->id));
        }else{
            return redirect(route('doctors.index'));
        }

    }
}
