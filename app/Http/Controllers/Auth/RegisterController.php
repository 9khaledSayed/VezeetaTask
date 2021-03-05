<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:doctor');
        $this->middleware('guest:customer');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $doctorValidationRules = Doctor::$rules;
        return Validator::make($data, [
            'name' => $doctorValidationRules['name'],
            'email' => $doctorValidationRules['email'],
            'phone' => $doctorValidationRules['phone'],
            'specialization' => $doctorValidationRules['specialization'],
            'address' => $doctorValidationRules['address'],
            'password' => $doctorValidationRules['password'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Doctor
     */
    protected function create(array $data)
    {
        return Doctor::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'specialization' => $data['specialization'],
            'address' => $data['address'],
            'password' => $data['password'],
        ]);
    }

    public function showCustomerRegisterForm()
    {
        return view('auth.register_customer');
    }

    protected function createCustomer(Request $request)
    {
        $customer = Customer::create($this->validate($request, Customer::$rules));
        return redirect()->intended($this->redirectTo);
    }
}
