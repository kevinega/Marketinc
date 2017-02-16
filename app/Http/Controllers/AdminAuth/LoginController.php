<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
//use Illuminate\Support\Facades\Auth;
use Auth;
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
    protected $redirectTo = 'unicorn/home';
    protected $guard = 'admin_users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest_admin', ['except' => 'logout']);
    }


    public function showLoginForm()
    {
        return view('admin-auth.login');
    }

    //override method username
    protected function username()
    {
        //return 'email';
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard('admin_users');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('unicorn/');
    }

}
