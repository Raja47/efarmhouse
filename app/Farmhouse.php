<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Farmhouse extends Model
{

	use SoftDeletes,InteractsWithMedia;

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

  public function facilities(){
		return $this->belongsToMany('App\Facility');
	}

	public function faqs(){
		return $this->hasMany('App\Faq');
	}

	public function extra_infos(){
		return $this->hasMany('App\ExtraInfo');
	}

	public function seos(){
		return $this->hasMany('App\Seo');
	}

}
