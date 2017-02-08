<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class AdminHomeController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
   }

    public function index()
    {
        $brands = Brand::all();
        return view('admin-home')->with(['brands'=>$brands]);
    }


 //    public function index()
	// {
	// 	$users = User::all();

	// 	return View::make('user.index', ['users' => $users]);
	// }

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User;

		$user->first_name = Input::get('first_name');
		$user->last_name  = Input::get('last_name');
		$user->username   = Input::get('username');
		$user->email      = Input::get('email');
		$user->password   = Hash::make(Input::get('password'));

		$user->save();

		return Redirect::to('/user');
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('user.edit', [ 'user' => $user ]);
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$brand = Brand::find($id);

		$brand->brand_name = 'Kampred ' . $id;
	
		$brand->save();

		return Redirect::to('/user');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Brand::destroy($id);

		return Redirect::to('/admin/home');
	}

}

