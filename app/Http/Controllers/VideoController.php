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

    	$video = new Video();
    	$user = \Auth::user();
    	$video->user_id = $user->id;
    	$video->title = $request->input('title');
    	$video->description = $request->input('description');

    	// Subir Imagen
    	$image = $request->file('image');
    	if($image){
    		$image_path = time().$image->getClientOriginalName();
    		\Storage::disk('images')->put($image_path, \File::get($image));

    		$video->image = $image_path;
    	}

    	// Subir Video
    	$video_file = $request->file('video');
    	if($video_file){
    		$video_path = time().$video_file->getClientOriginalName();
    		\Storage::disk('videos')->put($video_path, \File::get($video_file));

    		$video->video_path = $video_path;
    	}

    	$video->save();

    	return redirect()->route('home')->with(array(
    		'message' => 'El video se ha guardado correctamente'
    	));
    }

    public function getImage($filename){
    	$file = Storage::disk('images')->get($filename);
    	return new Response($file, 200);
    }

    public function getVideo($filename){
        $file = Storage::disk('videos')->get($filename);
        return new Response($file, 200);
    }

    public function getVideoDetail($video_id){
        $video = Video::find($video_id);

        return view('video.detalle', array(
            'video' => $video
        ));
    }
}
