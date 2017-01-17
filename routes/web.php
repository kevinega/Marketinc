<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'brand'], function(){

	Route::get('post', [
		'as' => 'get_site',
		'uses' => 'ForumController@getSite'
	]);

	Route::post('post', [
		'as' => 'submit_brand',
		'uses' => 'ForumController@submitBrand'
	]);

 
});