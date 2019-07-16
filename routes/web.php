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

Route::get('/', [
	'as' => 'home',
	'uses' => 'HomeController@index'
]);

// Videos
Route::get('/crear-video', array(
	'as' => 'createVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@createVideo'
));
Route::post('/guardar-video', array(
	'as' => 'saveVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@saveVideo'
));
Route::get('/miniatura/{filename}', array(
	'as' => 'imageVideo',
	'uses' => 'VideoController@getImage'
));
Route::get('/video-file/{filename}', array(
	'as' => 'fileVideo',
	'uses' => 'videoController@getVideo'
));
Route::get('/video/{video_id}', array(
	'as' => 'detailVideo',
	'uses' => 'VideoController@getVideoDetail'
));
Route::get('/edit-video/{video_id}', array(
	'as' => 'editVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@edit'
));
Route::get('/delete-video/{video_id}', array(
	'as' => 'deleteVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@delete'
));
Route::post('/update-video/{video_id}', array(
	'as' => 'updateVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@update'
));
Route::get('/buscar/{search?}/{filter?}', [
	'as' => 'searchVideo',
	'uses' => 'VideoController@search'
]);

// Usuarios

Route::get('/canal/{user_id}', [
	'as' => 'channel',
	'uses' => 'UserController@channel'
]);

// Comments
Route::post('/comment', array(
	'as' => 'comment',
	'middleware' => 'auth',
	'uses' => 'CommentController@store'
));
Route::get('/delete-comment/{comment_id}', array(
	'as' => 'commentDelete',
	'middleware' => 'auth',
	'uses' => 'CommentController@delete'
));