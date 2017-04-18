<?php

namespace App\Http\Controllers;

use Image;
use App\Brand;
use App\Promotion;
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
    }

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
     * Get a validator for an incoming upload photo request.
     * 
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    function validatorCover(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'cover' => 'required|mimes:jpeg,jpg,png|dimensions:min_width=500,min_height=100|max:2000',
                ],
                [  
                    'cover.required' => "You haven't choose your image yet",
                    'cover.mimes' => "Cover must be an image",
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
     * Get a validator for an incoming promotion list.
     * 
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    function validatorPromo(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'promo' => 'required|mimes:jpeg,jpg,png|dimensions:min_width=300,min_height=300,ratio=1/1|max:2000',
                    'title' => 'required',
                    'desc' => 'requiered',
                    'promo-type' => 'required',
                    'disc_value' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required', 
                ],
                [  
                    
                ]
                );

        if($validator->fails()) {
            return \Response::json(array('status' => 'errors', 'message' => $validator->messages()));
        } else {
            $this->addPromo($request);
            return \Response::json(array('status' => 'success'));
        }
    }

    function addPromo(Request $request,$image)
    {   
        //To Do bikin upload foto ngembaliin string 
        $promo = new Promotion();
        $promo->brand_id = Auth::user()->id();
        $promo->title = $request->title;
        $promo->image = "image"; //nanti data hasil proses
        $promo->description = $request->description;
        $promo->promotion_type = $request->promotionType;
        $promo->start_date = $request->start_date;
        $promo->end_date = $request->end_date;
        if($request->has('sun')){
            $promo->valid_sun = $request->sun;
        }
        if($request->has('mon')){
            $promo->valid_mon = $request->mon;
        }
        if($request->has('tue')){
            $promo->valid_tue = $request->tue;
        }
        if($request->has('wed')){
            $promo->valid_wed = $request->wed;
        }
        if($request->has('thu')){
            $promo->valid_thu = $request->thu;
        }
        if($request->has('thu')){
            $promo->valid_thu = $request->thu;
        }
        if($request->has('fri')){
            $promo->valid_fri = $request->fri;
        }
        return $promo->save();


    }


}
