<?php

namespace App\Http\Controllers\Auth;

use App\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/brand';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    //override method credentials
    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'), ['verified' => 1]);
    }
    

    //override method username
    protected function username()
    {
        //return 'email';
        return 'username';
    }

    //override failed attempt login
    protected function sendFailedLoginResponse(Request $request)
    {
        // return redirect()->back()
        //     ->withInput($request->only($this->username(), 'remember'))
        //     ->withErrors([
        //         $this->username() => Lang::get('auth.failed'),
        //         'credentials' => 'We were unable to sign you in'
        //     ]);
        
         if ( ! Brand::where('username', $request->username)->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => Lang::get('auth.username'),
                ]);
        }

        if ( ! Brand::where('username', $request->username)->where('password', bcrypt($request->password))->first() ) {
            
            if( ! Brand::where('username', $request->username)->where('verified', 1)->first()){
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    'confirmed' => Lang::get('auth.confirmed'),
                ]);
            }
            
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => Lang::get('auth.password'),
                ]);
        }
    }

        
        

}
