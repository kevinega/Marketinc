<?php

namespace App\Http\Controllers;

use Image;
use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
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
        $this->middleware('auth_brand');
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

        if ($request -> hasFile('cover')) {
            $width = (int)$request -> input('w');
            $height = (int)$request -> input('h');
            $coorX = (int)$request -> input('x');
            $coorY = (int)$request -> input('y');

            $file = $request -> file('cover');
            $ext = $file->extension();
            $id = auth()->id();

            //delete unused file with different extension
            $imgFiles = Storage::files("public/brands/{$id}/");
            $prevImg = preg_grep("/cover-{$id}/", $imgFiles);
            Storage::delete($prevImg);

            Image::make($file)
                ->crop($width, $height, $coorX, $coorY)
                ->fit(1550,310)
                ->save(storage_path("app/public/brands/{$id}/cover-{$id}.{$ext}"));

            return $this -> storePhoto("brands/{$id}/cover-{$id}.{$ext}", "cover");

        } elseif($request -> hasFile('logo')) {
            $file = $request -> file('logo');
            $ext = $file->extension();
            $id = auth()->id();

            //delete unused file with different extension
            $imgFiles = Storage::files("public/brands/{$id}/");
            $prevImg = preg_grep("/logo-{$id}/", $imgFiles);
            Storage::delete($prevImg);

            $file->storeAs("public/brands/{$id}", "logo-{$id}.{$ext}");
            return $this -> storePhoto("brands/{$id}/logo-{$id}.{$ext}", "logo");
        } 

        return redirect('brand');
    }

    public function storePhoto($photo, $type) {

        $brand = Brand::where("id", "=", Auth::user()->id)->first();
        
        if($type == "cover"){
            $brand->cover = $photo;
        }elseif($type == "logo"){
            $brand->logo = $photo;
        } 
        
        $brand->save();

        return redirect('brand/'.Auth::user()->username);
    }

    /**
     * Get a validator for an incoming upload photo request.
     * 
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                'cover' => 'mimes:jpeg,jpg,png|dimensions:min_width=500,min_height=500|max:2000',
                'logo' => 'mimes:jpeg,jpg,png|dimensions:min_width=520,min_height=520',
            ],
            [  
                'cover.mimes' => "Cover must be an image",
                'cover.dimensions' => 'Minimum image dimension is 500px', 
                'cover.max' => 'Maximum image size is 2mb', 
                'logo.dimensions' => 'Minimum image size is 520',
            ]
            );
    }
}
