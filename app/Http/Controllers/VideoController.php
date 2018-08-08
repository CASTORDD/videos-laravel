<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use App\Video;
use App\Comments;

class VideoController extends Controller
{
    public function createVideo(){
    	return view('video.createVideo');
    }
    public function saveVideo(Request $request){
    	$validateData = $this->validate($request, [
    		'title' => 'required',
    		'description' => 'required',
    		'video' => 'mimes:mp4'
    	]);
    }
}
