<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Farmhouse extends Model implements HasMedia
{

	use SoftDeletes,InteractsWithMedia;

	protected $table = 'farmhouses';
	
	protected $fillable = ['id', 'group_id', 'city_id', 'sku', 'title', 'slug','short_description', 'description', 'keywords', 'price', 'sale_price', 'weekdays_difference', 'halfday_feature', 'morning_start_time','morning_shift_price','morning_shift_sale_price', 'morning_end_time', 'evening_start_time', 'evening_end_time','evening_shift_price','evening_shift_sale_price', 'halfday_weekdays_difference', 'contact', 'location_address', 'location_lng', 'location_lat', 'location_zoom', 'youtube_video_link', 'featured_image', 'banner_image','seo_title','seo_description', 'seo_keywords' ,'family_friendly' ,'featured', 'status' ];

	protected $casts = [
		'keywords' 			=> 'array',
		'seo_keywords' 		=> 'array',
		'status' 			=> 'boolean',
		'featured' 			=> 'boolean',
		'family_friendly'	=> 'boolean',
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
