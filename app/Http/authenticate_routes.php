<?php

/*
|--------------------------------------------------------------------------
| Authenticate routes
|--------------------------------------------------------------------------
|
| Đây là file tổng hợp tất cả các routes liên quan tới việc authenticate khu vực frontend
|   - Các routes đều bắt đầu với /auth.
|	 - Các routes đều đi qua middleware guest (Nht\Http\Middleware\RedirectIfAuthenticated), ngoại trừ logout route.
|   - Các controllers bắt đầu với namespace Nht\Http\Controllers\Auth
*/

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {

	// Logout
	Route::get('logout', [
		'as'   => 'auth.logout',
		'uses' => 'AuthController@getLogout'
	]);

	// Sign up
	Route::get('register', [
		'as'   => 'auth.register',
		'uses' => 'AuthController@getRegister'
	]);

	Route::post('register', [
		'as'   => 'auth.post.register',
		'uses' => 'AuthController@postRegister'
	]);

	// Login
	Route::get('login', [
		'as'   => 'auth.login',
		'uses' => 'AuthController@getLogin'
	]);

	Route::post('login', [
		'as'   => 'auth.post.login',
		'uses' => 'AuthController@postLogin'
	]);

	// Get link reset password
	Route::get('forget', [
		'as' => 'auth.forget',
		'uses' => 'PasswordController@getEmail'
	]);

	Route::post('forget', [
		'as' => 'auth.post.forget',
		'uses' => 'PasswordController@postEmail'
	]);

	// Reset password
	Route::get('password/reset/{token}', [
		'as' => 'auth.reset-password',
		'uses' => 'PasswordController@getReset'
	]);

	Route::post('password/reset', [
		'as' => 'auth.post.reset-password',
		'uses' => 'PasswordController@postReset'
	]);

	// Login with socialite
	Route::get('{provider}', [
		'as' => 'auth.socialite',
		'uses' => 'AuthController@loginWithSocialite'
	]);
});