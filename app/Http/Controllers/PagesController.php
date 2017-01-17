<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;



class PagesController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
		$brands = Brand::orderBy('created_at', 'desc')->get();
        return view('pages.home', compact('brands'));
    }
}
