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

Route::get('/', function () {
    return view('welcome');
});

/**
*   User Default Auth Routes
*/

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('home', 'HomeController@index');

/**
 *  Register
 */
Route::post('register', 'Auth\RegisterController@register');
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'Auth\RegisterController@confirm'
]);

/**
*   Admin CMS Routes 
*/

//LOGIN
Route::get('admin/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'AdminAuth\LoginController@login');
Route::post('admin/logout', 'AdminAuth\LoginController@logout')->name('logout');
//CMS
Route::get('admin/home', 'AdminHomeController@index');
Route::get('/admin/approve/{id}', 'AdminHomeController@approveTransaction');
Route::get('/admin/delete/{id}', 'AdminHomeController@deleteTransaction');

/**
*  Confirmation Page
*/

Route::get('confirmation', 'TransactionController@index');
Route::post('confirmation', 'TransactionController@postConfirmation');