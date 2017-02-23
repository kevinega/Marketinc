<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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
    
    /**
     * redirect to brand homesite
     */
    public function redirect()
    {
        return redirect('brand/'.Auth::user()->username);    
    }

    /**
     * upload photo
     */
    public function uploadPhoto(Request $request)
    {
        $this->validator($request->all())->validate();

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

    /**
     * Get a validator for an incoming upload photo request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                'logo' => 'image|dimensions:min_width=520,min_height=520',
            ],
            [
                'logo.image' => 'Your format is not supported',  
                'logo.dimensions' => 'Minimum & Maximum image size is 520',
            ]
        );
    }
}
