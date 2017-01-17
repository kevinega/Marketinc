<?php

namespace App\Http\Controllers\Auth;

use App\Brand;
use App\Http\Controllers\Controller;
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
        return Validator::make($data, [
            'restaurant_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Brand::create([
            'restaurant_name' => $data['restaurant_name'],
            'url' => $data['url'], 
            'address' => $data['address'], 
            'location' => $data['location'], 
            'phone_one' => $data['phone_one'], 
            'phone_two' => $data['phone_two'],
            'membership' => $data['membership'], 
            'description' => $data['description'], 
            'logo' => $data['logo'],
            'cover' => $data['cover'],
            'open_hour' => $data['open_hour'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return redirectTo('/home');

    }
}
