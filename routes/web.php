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

Route::resource('/events', 'EventController');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/first', 'HomeController@welcome')->name('welcome'); ////?????????????


Route::get('/add/{id}', 'FeaturesController@addGameToCollection');

Route::get('/users/{user}/unattend', 'FeaturesController@unattendEvent');
Route::delete('/users/{user}/unattend', 'FeaturesController@unattendEvent');

Route::get('/events/attend/{event}', 'FeaturesController@attendEvent');
Route::post('/events/attend/{event}', 'FeaturesController@attendEvent');


Route::resource('/games', 'BoardGameController');
Route::resource('/locations', 'LocationController');
Route::resource('/users', 'UserController');

Route::get('/events/{Event}', 'CommentController@store');
Route::post('/events/{Event}', 'CommentController@store');

/* Route::get('logout', 'Auth\LoginController@logout'); */




