<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Farmhouse extends Model
{

	use SoftDeletes,InteractsWithMedia;

	protected $fillable = ['id', 'group_id', 'city_id', 'sku', 'title', 'slug', 'description', 'keywords', 'price', 'sale_price', 'weekdays_discount', 'halfday_feature', 'morning_start_time', 'morning_end_time', 'evening_start_time', 'evening_end_time', 'halfday_price', 'halfday_sale_price', 'halfday_weekdays_discount', 'contact', 'location_address', 'location_lng', 'location_lat', 'location_zoom', 'youtube_video_link', 'featured_image', 'banner_image', 'family_friendly', 'featured', 'status'];

	protected $casts = [
		'status' => 'boolean',
		'featured' => 'boolean'
	];
	 /**
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

	public function group(){
		return $this->belongsTo('App\Group');
	}

  public function images(){
  	return $this->morphMany(Image::class, 'imageable');	
  } 

  public function city(){
  	return $this->belongsTo('App\City');
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
