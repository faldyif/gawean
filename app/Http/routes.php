<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userinfo', function () {
    return view('userinfo');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
	Route::resource('job', 'JobController');
	Route::resource('offer', 'OfferController');
	Route::resource('message', 'MessageController');
	Route::resource('profile', 'ProfileController', ['except' => ['create']]);
  Route::get('message/create/{id}', 'MessageController@sendTo')->name('message.sendto');
	Route::get('editprofile', 'ProfileController@edit')->name('profile.edit');
	Route::get('search/{query}', 'SearchController@show')->name('search.show');
});
