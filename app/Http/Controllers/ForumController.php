<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBrandRequest;
use App\Http\Controllers\Controller;
use App\Brand;

class ForumController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function getSite(){
    	 return view('pages.brand');
    }

    public function submitBrand(CreateBrandRequest $request){
    	$brand = new Brand();
    	$brand->title = $request['title'];
    	$brand->body = $request['body'];
    	$brand->promo = $request['promo'];
    	$brand->save();
    	return redirect('/');
    }
}
