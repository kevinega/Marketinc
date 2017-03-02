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
       //dd($article_info); 
        //$this->articleValidator($request->all())->validate(); 
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
 
        if($request->published_on == ''){ 
            $article->published_on = $article_info->publishedTime; 
        }else{ 
            $article->published_on = $request->published_on; 
        } 
 
        if($article->save()){ 
            dd('success'); 
            return back(); 
        }else{ 
            return 404; 
        } 
    }  
 
    public function articleValidator(array $data){ 
 
        return Validator::make($data, [ 
            'url' => 'url|required' 
        ] 
 
        ); 
    } 
  
    public function embedArticle(){  
        $message = ''; 
        $article =  Article::select(DB::raw('articles.*, count(*) as `aggregate`'))  
                      ->join('brands', 'articles.brand_id', '=', 'brands.id')  
                      ->groupBy('brands.id')  
                      ->where('brands.id','=', Auth::user()->id)->first();          
        //dd($article); 
        if ($article) { 
            $info = [  
                'url' => Embed::create($article->url)  
            ];  
        }else{ 
            $info = "is empty"; 
        } 
         
        if($info){ 
            $message = [ 
                'image' => $article->image, 
                'url' => $article->url, 
                'author' => $article->author, 
                'title' => $article->title, 
                'published_on' => $article->published_on 
            ]; 
        }   
        return \Response::json(['status' => 'success', 'message' => $message],200);  
         // return 'lutpi gay';  
        //dd('wadaw');  
    }  
}
