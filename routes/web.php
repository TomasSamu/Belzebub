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

Route::delete('/events/list/{id}', 'EventController@destroy');


Route::get('events/edit/{id}', 'EventController@edit')->where(['id' => '\d+']);
Route::put('events/edit/{id}', 'EventController@update');

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/games', 'BoardGameController');
Route::resource('/location', 'LocationController');


Route::get('/users', 'UserController@list');
