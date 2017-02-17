<?php

namespace App\Http\Controllers\AdminAuth;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

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
            'brand_name' => 'required|min:3|max:150|unique:brands',
            'username' => array('required','min:3','max:150','unique:brands','regex:/^(?:[a-z]|[\S]|([.])(?!\1)){3,150}$/'),
            'address' => 'required',
            'phone_one' => 'required|regex:/^[+]{0,1}[0-9]{5,15}/',
            'phone_two' => 'regex:/^[+]{0,1}[0-9]{5,15}/',
            'email' => 'required|email',
            'password' => 'required|min:6|max:25|confirmed',
            'membership' => 'required',
        ],

        [
            'brand_name.required' => 'Restaurant name is required',
            'brand_name.min' => 'Restaurant name is too short, min 3 characters',
            'brand_name.max' => 'Restaurant name is too long, max 150 characters',
            'brand_name.unique' => 'Restaurant name already exist',      
            
            'username.required' => 'Username is required',
            'username.min' => 'Username is too short, min 3 characters',
            'username.max' => 'Username is too long, max 150 characters',
            'username.unique' => 'Username already exist',
            'username.regex'   => 'Username should contains characters or dot only',
            
            'address.required' => 'Address is required',
            
            'phone_one.required' => 'Phone number 1 is required',
            'phone_one.regex' => 'Phone number 1 is invalid',
            
            'phone_two.regex' => 'Phone number 2 is invalid',
            
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            
            'password.required' => 'Password is required',
            'password.min' => 'Password is too short, min 6 digits',
            'password.max' => 'Password is too long, max 25 digits',
            'password.confirmed' => 'Password is not match',
            
            'membership.required' => 'Choose one package',
            'membership.in' => 'Choose one'

        ]
        );
    }

    /**()
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $username = $data['username'];
        $email = $data['email'];
        $confirmation_code = str_random(30);
        Brand::create([
            'brand_name' => $data['brand_name'],
            'username' => $username, 
            'address' => $data['address'],  
            'phone_one' => $data['phone_one'], 
            'phone_two' => $data['phone_two'],
            'membership' => $data['membership'], 
            'description' => NULL, 
            'logo' => NULL,
            'cover' => NULL,
            'open_hour' => NULL,
            'email' => $email,
            'password' => bcrypt($data['password']),
            'confirmation_code' => $confirmation_code,
            'confirmed' => 0,
            'music' => NULL,
        ]);
        $sesuatu = ['confirmation_code' => $confirmation_code, 'username' => $username];
        
        Mail::send('email.verify',$sesuatu, function($message) use ($email){
            $message->from('freeajabanget@gmail.com','Marketinc');
            $message->to($email)->subject('Verify your email address');
        });

        // Flash::message('Thanks for registering to Marketinc! Please check your email to activate yout account');

       return true;

    }

    public function confirm($confirmation_code){

        if(!$confirmation_code){
            throw new InvalidConfirmationCodeException;
        }
        $brand = Brand::whereConfirmationCode($confirmation_code)->first();

        if(!$brand){
            throw new InvalidConfirmationCodeException;
        }

        $brand->confirmed = 1;
        $brand->confirmation_code = null;
        $brand->save();

        //Flash::message('You have successfully activated your account');

        return redirect('/login');


    }

        /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        if($user){
            // dd($user."dalam");
        return redirect('login');
        }
        // dd($user."luar");
    }

}
