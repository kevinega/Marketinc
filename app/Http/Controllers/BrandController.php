<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Article;
use Embed\Embed;
use DB;
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

    public function createArticle(Request $request){  
        $article_info = Embed::create($request->url);  
        $this->articleValidator($request->all())->validate(); 
        $article = new Article();  
        $article->brand_id = Auth::user()->id;  
        $article->title = $request->title;  
        $article->url = $request->url; 
        $article->image = $article_info->image; 
        if($request->author == ''){ 
            $article->author = $article_info->authorName; 
        }else{ 
            $article->author = $request->author; 
        } 
        
        if($request->description == ''){ 
            $article->description = $article_info->description; 
        }else{ 
            $article->description = $request->description; 
        } 
        
        if($article->save()){  
            return back()->with('message','The new article is successfully added'); 
        }else{ 
            return back()->with('message','Oops, something wrong with the server, please try again.'); 
        } 
    }  
    
    public function articleValidator(array $data){ 
       
        return Validator::make($data, [ 
            'url' => 'url|required',
            'title' => 'required',
            'author' => 'required',
            'description' => 'required'
            ] 
            ); 
    } 
    
    public function embedArticle(){   
        $article = Article::whereBrandId(Auth::user()->id)->get(); 
        if(!$article->isEmpty()){ 
            $message = $article;
            $status = 'success';
        }else{
            $message = 'Oops, something wrong with the server, please refresh the page';
            $status = 'failed';
        }  
        return \Response::json(array('status'=>$status, 'message'=>$message));
        
    }  

    public function extractUrl(Request $request){
        $article_info = Embed::create($request->url);
        // $phpdate = $article_info->publishedTime;
        // $publishDate = date('mm/dd/yyyy', strtotime(str_replace('-','/', $phpdate)));
        //dd('masuk'); 
       //dd($article_info); 
        $message = [
        'author' => $article_info->authorName,
        'title' => $article_info->title,
        'description' => $article_info->description,
        ];

        return \Response::json(array('message'=>$message)); 
    }
}
