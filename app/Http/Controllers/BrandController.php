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

            $this -> storePhoto("brands/{$id}/cover-{$id}.{$ext}", "cover");

        } elseif($request -> hasFile('logo')) {
            $width = (int)$request -> input('w-logo');
            $height = (int)$request -> input('h-logo');
            $coorX = (int)$request -> input('x-logo');
            $coorY = (int)$request -> input('y-logo');

            $file = $request -> file('logo');
            $ext = $file->extension();
            $id = auth()->id();

            //delete unused file with different extension
            $imgFiles = Storage::files("public/brands/{$id}/");
            $prevImg = preg_grep("/logo-{$id}/", $imgFiles);
            Storage::delete($prevImg);
            
            Image::make($file)
                ->crop($width, $height, $coorX, $coorY)
                ->fit(500,500)
                ->save(storage_path("app/public/brands/{$id}/logo-{$id}.{$ext}"));

            $this -> storePhoto("brands/{$id}/logo-{$id}.{$ext}", "logo");
        }
    }

    /*
     * Store Photo to DB
     */
    public function storePhoto($photo, $type) {
        
        $brand = Brand::where("id", "=", Auth::user()->id)->first();
        
        if($type == "cover"){
            $brand->cover = $photo;
        }elseif($type == "logo"){
            $brand->logo = $photo;
        } 
        
        $brand->save();
    }

    /**
     * Get a validator for an incoming upload cover request.
     * 
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    function validatorCover(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'cover' => 'required|image|dimensions:min_width=500,min_height=100|max:2000',
                ],
                [  
                    'cover.required' => "You haven't choose your image yet",
                    'cover.image' => "Cover must be an image",
                    'cover.dimensions' => 'Minimum image dimension is 500x100px', 
                    'cover.max' => 'Maximum image size is 2mb',
                ]
                );

        if($validator->fails()) {
            return \Response::json(array('status' => 'errors', 'message' => $validator->messages()));
        } else {
            $this->uploadPhoto($request);
            return \Response::json(array('status' => 'success'));
        }
    }

        /**
     * Get a validator for an incoming upload logo request.
     * 
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    function validatorLogo(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'logo' => 'required|image|dimensions:min_width=200,min_height=200|max:2000',
                ],
                [  
                    'logo.required' => "You haven't choose your image yet",
                    'logo.image' => "Logo must be an image",
                    'logo.dimensions' => 'Minimum image dimension is 200x200px', 
                    'logo.max' => 'Maximum image size is 2mb',
                ]
                );

        if($validator->fails()) {
            return \Response::json(array('status' => 'errors', 'message' => $validator->messages()));
        } else {
            $this->uploadPhoto($request);
            return \Response::json(array('status' => 'success'));
        }
    }
}
