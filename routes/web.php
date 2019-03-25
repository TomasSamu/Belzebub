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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();


Route::resource('/events', 'EventController');
Route::get('/listByParam', 'EventController@eventsByParam');

//ratings routes
Route::get('/events/rating/{event}', 'EventController@rating');
Route::post('/events/rating/{event}', 'EventController@rating');
Route::get('/games/rating/{game}', 'BoardGameController@rating');
Route::post('/games/rating/{game}', 'BoardGameController@rating');
Route::get('/locations/rating/{game}', 'LocationController@rating');
Route::post('/locations/rating/{game}', 'LocationController@rating');

Route::get('/events/{Event}', 'CommentController@eventCommentStore');
Route::post('/events/{Event}', 'CommentController@eventCommentStore');
Route::get('/games/{game}', 'CommentController@gameCommentStore');
Route::post('/game/{game}', 'CommentController@gameCommentStore');
Route::get('/locations/{location}', 'CommentController@locationCommentStore');
Route::post('/locations/{location}', 'CommentController@locationCommentStore');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@welcome')->name('welcome'); 

Route::get('/add/{id}', 'FeaturesController@addGameToCollection');
Route::post('/remove/game/{id}', 'FeaturesController@removeGameFromCollection');
Route::post('/remove/genre/{id}', 'FeaturesController@removeGenreFromCollection');
Route::get('/offer/offerIndex', 'FeaturesController@offersIndex');
Route::get('/offer/show/{id}', 'FeaturesController@offersShow');
Route::post('/offer/{id}', 'FeaturesController@createOffer');

Route::get('/users/{user}/unattend', 'FeaturesController@unattendEvent');
Route::delete('/users/{user}/unattend', 'FeaturesController@unattendEvent');

Route::get('/events/attend/{event}', 'FeaturesController@attendEvent');
Route::post('/events/attend/{event}', 'FeaturesController@attendEvent');

Route::get('/games/filter', 'BoardGameController@search');
Route::resource('/games', 'BoardGameController');
Route::resource('/locations', 'LocationController');
Route::resource('/users', 'UserController');




/* Route::get('logout', 'Auth\LoginController@logout'); */




