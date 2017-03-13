<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            $id = Auth::user()->id;
            // var_dump($id);
            $brands = Brand::findOrFail($id);
            // var_dump($brands);
            return view('brand-home', compact('brands'));    
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

        if ($request -> hasFile('cover')){
            $file = $request -> file('cover');
            $ext = $file->extension();
            $id = auth()->id();

            $imgFiles = Storage::files("public/brands/{$id}/");
            $prevImg = preg_grep("/cover-{$id}/", $imgFiles);
            Storage::delete($prevImg);

            $file->storeAs("public/brands/{$id}", "cover-{$id}.{$ext}");
            return $this -> storePhoto("brands/{$id}/cover-{$id}.{$ext}", "cover");

        } elseif($request -> hasFile('logo')){
            $file = $request -> file('logo');
            $ext = $file->extension();
            $id = auth()->id();

            $imgFiles = Storage::files("public/brands/{$id}/");
            $prevImg = preg_grep("/logo-{$id}/", $imgFiles);
            Storage::delete($prevImg);

            $file->storeAs("public/brands/{$id}", "logo-{$id}.{$ext}");
            return $this -> storePhoto("brands/{$id}/logo-{$id}.{$ext}", "logo");

        } 
    }

    public function storePhoto($photo, $type){

        $brand = Brand::where("id", "=", Auth::user()->id)->first();
        
        if($type == "cover"){
            $brand->cover = $photo;
        }elseif($type == "logo"){
            $brand->logo = $photo;
        } 
        
        $brand->save();

        return back();
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
                'cover' => 'image|mimes:jpeg,jpg,png|dimensions:min_width=530,min_height=530',
                'logo' => 'image|mimes:jpeg,jpg,png|dimensions:min_width=520,min_height=520',
            ],
            [  
                'cover.dimensions' => 'Minimum & Maximum image size is 530', 
                'logo.dimensions' => 'Minimum & Maximum image size is 520',
            ]
        );
    }

    public function updateDetails(Request $request){
        $brand = Brand::where("id", "=", Auth::user()->id)->first();
        $facility = Facility::where("id", "=", Auth::user()->id)->first();

        $validator = Validator::make($request->all(), [
                'description' => 'required',
                'address' => 'required',
                'open_hour' => 'required',
            ]
        );

        if($validator->fails()){
            return back()->with("message",$validator->messages());
        }
        $brand->description = $request->description;
        $brand->address = $request->address;
        if($request->phone_one != ''){
            $brand->phone_one = $request->phone_one;
        }
        if($request->phone_two !=''){
            $brand->phone_two = $request->phone_two;
        }
        $brand->open_hour = $request->open_hour;
        // $facility->breakfast = $request->
        // 'wifi'
        // 'smoking_area'
        // 'ac'
        // 'working_environment'
        // 'reservation'
        // 'private_room'
        // 'alcohol'
        // 'valet'
        // 'delivery_services'
        // 'served_pork'
        if($brand->save()){
            return back()->with('message','Details are updated successfully');
        }else{
            return back()->with('message','Oops, there is something wrong with the server. Please try again');
        }

    }
}
