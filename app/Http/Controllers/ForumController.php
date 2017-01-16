<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForumController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function getSite(){
    	return view('pages.brand')
    }
}
