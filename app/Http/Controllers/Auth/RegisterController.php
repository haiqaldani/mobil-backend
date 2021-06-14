<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $message = array(
            'full_name.required' => 'Please enter a full name',
            'full_name.max' => 'Maximum is 255 characters',
            'phone_number.required' => 'Please enter a phone number',
            'phone_number.min' => 'Minimum is 13 digits',
            'phone_number.max' => 'Maximum is 13 digits',
            'email.required' => 'Please enter a email',
            'email.email' => 'Please enter a valid email',
            'email.unique:users' => 'Email is already registered',
            'password.required' => 'Please enter a password',
            'password.min' => 'Minimum 8 characters'


        );

        return Validator::make($data, [
            'full_name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric', 'digits_between:9,13'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ], $message);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'full_name' => $data['full_name'],
            'phone_number' => (62 . $data['phone_number']),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
