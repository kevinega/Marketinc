<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
    * public function __construct()
    * {
    *     $this->middleware('auth');
    * }
    */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($username)
    {
        if($username == Auth::user()->username) {
            return view('brand-home');    
        }
            return '404';
    }

    public function redirect()
    {
        return redirect('brand/'.Auth::user()->username);    
    }

    public function uploadPhoto(Request $request)
    {
        $file = $request -> file('logo');
        $ext = $file->extension();
        $id = auth()->id();

        $file->storeAs("public/brands/{$id}", "logo-{$id}.{$ext}");
        
        return $this -> storePhoto("brands/{$id}/logo-{$id}.{$ext}");
    }

    public function storePhoto($photo){

        $brand = Brand::where("id", "=", Auth::user()->id)->first();
        $brand->logo = $photo;
        $brand->save();

        return back();
    }
}
