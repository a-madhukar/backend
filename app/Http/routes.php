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

Route::group(['prefix'=>'/api/auth'],function(){
	Route::post("register","AuthController@register");
	Route::post("login","AuthController@login");  
}); 

Route::group(['prefix'=>'/api/create'],function(){
	Route::post("company","CompanyController@create"); 
}); 

Route::get("email","AuthController@testEmail"); 