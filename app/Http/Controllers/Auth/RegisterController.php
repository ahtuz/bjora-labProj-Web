<?php

namespace Bjora\Http\Controllers\Auth;

use Bjora\User;
use Bjora\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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

        // Validation for newly registered user
        
        return Validator::make($data, [
            'username' => 'required|string|max:100',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed|alpha_num',
            'gender' => 'required',
            'address' => 'required',
            'birthday' => 'required|date_format:Y-m-d',
            'profile_picture' => 'required|mimes:jpg,jpeg,png',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Bjora\User
     */
    protected function create(array $data)
    {
        /* 
            Before doing this, we need to command "php artisan storage:link".
            To store profile_picture to public/storage/profile_pictures folder.
            With the format username-time-original file name, there will be no duplicate file
            in the folder.
        */
        $file = $data['profile_picture'];
        $filename = $data['username'] . '-' . time() . '-' . $file->getClientOriginalName();
        $file->storeAs('profile_pictures', $filename, 'public');
        
        // the usual way to create new User using Eloquent
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'address' => $data['address'],
            'profile_picture' => $filename,
            'role' => "member",
            'birthday' => $data['birthday'],
        ]);
    }
}
