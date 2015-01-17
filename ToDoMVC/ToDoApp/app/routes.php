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
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));

Route::get('/login', array('as' => 'login','uses' => 'AuthController@getLogin'))->before('guest');
Route::post('/login', array('uses' => 'AuthController@postLogin'))->before('csrf');

Route::get('/register', array('as' => 'register', 'uses' => 'RegisterController@getRegister'))->before('guest');
Route::post('/register', array('uses' => 'RegisterController@postRegister'))->before('csrf');

Route::get('/dashboard', array('as' => 'dashboard', 'uses' => 'HomeController@getDashboard'))->before('auth');

Route::get('/logout', array('uses' => 'HomeController@getLogout'))->before('auth');

Route::get('/todos', array('as' => 'todos', 'uses' => 'HomeController@getTodos'))->before('auth');
Route::post('/todos', array('uses' => 'TodoController@postTodo'))->before('csrf');

Route::get('/todos/add', array('as' => 'add', 'uses' => 'TodoController@addTodoView'))->before('auth');
Route::post('/todos/add', array('uses' => "TodoController@addTodo"))->before('csrf');

Route::get('/delete/{element_id}', array('as' => 'delete', 'uses' => 'TodoController@deleteTodo'))->before('auth');

Route::bind('element_id', function($value, $route){
	return Item::where('id', $value)->first();
});