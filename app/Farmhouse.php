<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farmhouse extends Model
{

	use SoftDeletes;

	public function group(){
		return $this->belongsTo('App\Group');
	}

    public function images(){
    	return $this->morphMany(Image::class, 'imageable');	
    } 

    public function city(){
    	return $this->hasOne('App\City');
    }

    public function categories(){
    	return $this->belongsToMany('App\Category');
    }

}
