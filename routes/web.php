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
Route::group(['middleware' => 'guest'], function () {
	Route::get('brand/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('brand/login', 'Auth\LoginController@login');
	Route::post('brand/logout', 'Auth\LoginController@logout')->name('logout');

	// Registration Routes...
	Route::get('brand/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	Route::post('brand/register', 'Auth\RegisterController@register');
	
	//Email Verification
	Route::get('brand/register/verify/{confirmationCode}', [
    	'as' => 'confirmation_path',
    	'uses' => 'Auth\RegisterController@confirm'
	]);	

	// Password Reset Routes...
	Route::get('brand/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
	Route::post('brand/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
	Route::get('brand/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
	Route::post('brand/password/reset', 'Auth\ResetPasswordController@reset');
});

/**
*Routes group dimana route2 disini diakses apabila setelah login
*/
Route::group(['middleware' => 'auth_brand'], function () {
	
	/**
	* Home Access and Logout
	*/	
	Route::get('brand/embedArticle', 'BrandController@embedArticle');
	Route::get('brand/logout', 'Auth\LoginController@logout');
	Route::get('brand', 'BrandController@redirect');
	Route::get('brand/{username}', 'BrandController@index');

	/**
	*  Confirmation Page
	*/
	Route::get('/brand/confirmation', 'TransactionController@index');
	Route::post('/brand/confirmation', 'TransactionController@postConfirmation');

	/**
	*  Upload
	*/
	Route::post('brand/upload', 'BrandController@uploadPhoto');

	/*
	*	Article
	*/
	//create article
	Route::post('brand/article/create', 'BrandController@createArticle');
	
});


/**
*   Admin CMS Routes 
*/
Route::group(['middleware' => 'guest_admin'], function () {
	//LOGIN
	Route::get('unicorn/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
	Route::post('unicorn/login', 'AdminAuth\LoginController@login');
});

Route::group(['middleware' => 'admin'], function () {
	//logout
	Route::post('unicorn/logout', 'AdminAuth\LoginController@logout');
	//CMS
	Route::get('unicorn/transaction/order/{orderBy}', 'AdminHomeController@transactionManagementPageOrder');
	Route::get('unicorn/transaction/', 'AdminHomeController@transactionManagementPage');
	Route::get('unicorn/', 'AdminHomeController@brandManagementPage');
	Route::get('unicorn/home', 'AdminHomeController@brandManagementPage');
	Route::get('unicorn/home/order/{orderBy}', 'AdminHomeController@brandManagementPageOrder');
	Route::get('/unicorn/approve/{id}', 'AdminHomeController@approveTransaction');
	Route::get('/unicorn/delete/{id}', 'AdminHomeController@deleteTransaction');
	Route::get('/unicorn/reset/{id}', 'AdminHomeController@resetMembership');
});