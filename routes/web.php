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
use App\Video;

Route::get('/', function () {
	$videos = video::all();
	foreach($videos as $video){
		echo "<h2>$video->title</h2>";
		echo "<p>$video->user->email</p>";
		//var_dump($video);
		foreach ($video->comments as $coment) {
			echo "<p>$coment->body</p>";
		}
		
	}
	die();
    return view('welcome');
});
