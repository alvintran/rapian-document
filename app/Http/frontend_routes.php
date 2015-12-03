<?php

/*
|--------------------------------------------------------------------------
| Frontend routes
|--------------------------------------------------------------------------
|
| Đây là file tổng hợp tất cả các routes khu vực frontend
|   - Các controllers bắt đầu với namespace Nht\Http\Controllers\Frontend
*/

Route::group(['namespace' => 'Frontend'], function() {

	Route::get('/', [
		'as'   => 'frontend.index',
		'uses' => 'HomeController@index'
	]);

	// Profile
	//
	Route::group(['middleware' => 'auth', 'prefix' => 'profile'], function() {
		Route::get('/', [
			'as'   => 'frontend.profile',
			'uses' => 'ProfileController@index'
		]);

		Route::post('/', [
			'as'   => 'frontend.profile',
			'uses' => 'ProfileController@updateProfile'
		]);

		Route::get('change-password', [
			'as' => 'frontend.profile.password',
			'uses' => 'ProfileController@changePassword'
		]);

		Route::post('change-password', [
			'as' => 'frontend.post.profile.password',
			'uses' => 'ProfileController@postChangePassword'
		]);
	});

	// Blog
	//
   Route::get('write-blog', [
		'as'   => 'frontend.writeblog',
		'uses' => 'BlogController@write'
	]);

   Route::get('hot', [
        'as' => 'frontend.blogHot',
        'uses' => 'BlogController@hot'
   ]);

   Route::group(['prefix' => 'tags'], function() {
      Route::get('{tag}', [
         'as' => 'frontend.blogByTag',
         'uses' => 'BlogController@tag'
      ]);
   });

   Route::group(['prefix' => 'danh-muc'], function() {
	   Route::get('{category}-{name}', [
	         'as' => 'frontend.blogByCategory',
	         'uses' => 'BlogController@category'
	   ]);
   });
   Route::group(['prefix' => 'tac-gia'], function() {
	   Route::get('{author}-{name}', [
	         'as' => 'frontend.blogByAuthor',
	         'uses' => 'BlogController@author'
	   ]);
   });
   Route::group(['prefix' => 'blogs'], function() {
	   Route::get('{id}-{title}', [
	      'as' => 'frontend.blog',
	      'uses' => 'BlogController@get'
	   ]);
   });
});