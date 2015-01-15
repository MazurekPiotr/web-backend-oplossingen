<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'))->before('auth');
Route::post('/', array('uses' => 'HomeController@postIndex'))->before('csrf');
Route::get('/login', array('as' => 'login','uses' => 'AuthController@getLogin'));
Route::post('/login', array('uses' => 'AuthController@postLogin'))->before('csrf');
Route::get('/register', array('as' => 'register', 'uses' => 'RegisterController@getRegister'));