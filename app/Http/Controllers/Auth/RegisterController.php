<?php

namespace App\Http\Controllers\Auth;

use App\Brand;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

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
            //'password.confirmed' => 'required',
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

            'password.confirmed.required' => 'Confirm Password is required',
            
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

        //Mendaftarkan user baru sesuai form
          $brand = new Brand();
          $brand->brand_name = $data['brand_name'];
          $brand->username = $username;
          $brand->address = $data['address'];
          $brand->phone_one = $data['phone_one'];
          $brand->phone_two = $data['phone_two'];
          $brand->membership = 'free'; //default free sampai di approve admin
          $brand->email = $email;
          $brand->password = bcrypt($data['password']);
          $brand->confirmation_code = $confirmation_code;
          $brand->verified = 0;

        //kalo query berhasil
          if($brand->save()){
            //Kondisi apabila user memilih paid package
            if($data['membership'] == 'premium' || $data['membership'] == 'basic' || $data['membership'] == 'vip'){
                //simpan data transaction untuk pembayaran nanti
                $transaction_id = "mc".str_random(5);
                $id = $brand->id;
                $transaction = new Transaction();
                $transaction->brand_id = $id;
                $transaction->id = $transaction_id;
                $transaction->type = $data['membership'];
                $transaction->total_payment = '1000000'; //temporary

                //kalo query berhasil
                if($transaction->save()){
                    $trans = Transaction::where('brand_id','=', $id)->first();
                    $email = $trans->brand->email;
    
                    $data = ['confirmation_code' => $confirmation_code, 'username' => $username];
                
                    Mail::send('email.verify',$data, function($message) use ($email){
                        $message->from('freeajabanget@gmail.com','Marketinc');
                        $message->to($email)->subject('Account Activation: Verify your email address');
                    });

                }
                //berhasil harusnya return halaman berhasil regis silahkan cek email untuk melakukan pembayaran
                //sekaligus kasih link untuk akses free
                return true;

            }
            //Kondisi apabila user merupakan member free
            $data = ['confirmation_code' => $confirmation_code, 'username' => $username];
            
            Mail::send('email.verify',$data, function($message) use ($email){
                $message->from('freeajabanget@gmail.com','Marketinc');
                $message->to($email)->subject('Account Activation: Verify your email address');
            });
            
            //Berhasil harusnya return halaman berhasil regis silahkan cek email untuk verifikasi
           return true;
        }

        //Query Gagal 
        //Harusnya Return Halaman Mohon Maaf
        return false;
    }

    /**
    * Fungsi dari End-Point untuk melakukan konfirmasi akun user dari email
    */
    public function confirm($confirmation_code){

        if(!$confirmation_code){
            throw new InvalidConfirmationCodeException;
        }
        //cek confirmationcode ada ga di table brand
        $brand = Brand::whereConfirmationCode($confirmation_code)->first();
        
        if(!$brand){
            throw new InvalidConfirmationCodeException;
        }

        //cek ada ga ditable transaction id brand
        $transaction = $brand->transaction->first();
        //kirim email payment kalo idnya terdaftar di transaction
        if($transaction){
            $email = $brand->email;
            $data = [
                    'username' => $brand->username,
                    'transaction_id' => $transaction->id,
                    'total_payment' => $transaction->total_payment
                    ];
            Mail::send('email.payment',$data, function($message) use ($email){
                $message->from('freeajabanget@gmail.com','Marketinc');
                $message->to($email)->subject('Account Activation: Payment');
            });
        }
        //verifikasi akun
        $brand->verified = 1;
        $brand->confirmation_code = null;
        $brand->save();

        //Kasih kayak selamat udah berhasil aktifasi akun jika anda memilih paid package silahkan cek email anda untuk melanjutkan
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
            return redirect('login');
        }
    }

}
