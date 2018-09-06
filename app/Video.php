<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table='videos';

    public function comments(){
    	return $this->hasMany('App\Comment')->orderBy('id','desc');
    }

    public function user(){
    	return $this->belongsTo('App\user','user_id');
    }
}
