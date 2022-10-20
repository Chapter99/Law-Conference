<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
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

    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = 'users/home';

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
        $rule = [
            'title' => ['required'],
            'fname' => ['required', 'string', 'max:63'],
            'lname' => ['required', 'string', 'max:63'],
            'address' => ['required', 'string', 'max:255'],
            'province' => ['required'],
            'postcode' => ['required', 'string', 'max:7'],
            'tel' => ['required', 'string', 'max:31'],
            'register_type' => ['required'],
            'present' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        if($data['register_type'] == 3){
            $rule['partner'] = ['required'];
        }

        if($data['register_type'] == 4){
            $rule['org'] = ['required'];
        }

        $message = [
            'required' => 'ฟิลด์นี้จำเป็น',
        ];
        
        return Validator::make($data, $rule, $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'title' => $data['title'],
            'academic' => array_key_exists('academic', $data) ? $data['academic'] : null,
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'address' => $data['address'],
            'province' => $data['province'],
            'postcode' => $data['postcode'],
            'tel' => $data['tel'],
            'register_type' => $data['register_type'],
            'partner' => array_key_exists('partner', $data) ? $data['partner'] : null,
            'org' => array_key_exists('org', $data) ? $data['org'] : null,
            'present' => $data['present'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isAdmin' => 0,
            'status' => 1
        ]);
    }
}
