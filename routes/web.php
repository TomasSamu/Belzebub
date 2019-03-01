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
 Auth::routes();

//Route::get('/test', 'TestController@test');

Route::get('events/list', 'EventController@list');
Route::get('/events/create', 'EventController@create');
Route::post('/events', 'EventController@store');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/games/list', 'GameController@list');
Route::get('/games/detail/{id}', 'GameController@detail')->where(['id' => '\d+']);


Route::get('/users', 'UserController@list');