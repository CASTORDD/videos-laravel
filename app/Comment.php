<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{	
	protected $table='comments';

    public function user(){
    	return $this->belongsTo('App\user','user_id');
    }

    public function video(){
    	return $this->belongsTo('App\Video','video_id');
    }
}
