<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Facility extends Model implements HasMedia
{
    
    use SoftDeletes  , InteractsWithMedia;

    protected $table="facilities";

  	

  	protected $fillable = [ 'title' , 'slug'  , 'description','featured' , 'status' ,'orders'  ];

    protected $casts = [
        'featured' => 'boolean',
        'status'   => 'boolean'
    ];

    public function farmhouses(){
  		return $this->belongsToMany('App\Farmhouse');
  	}

  	 /**
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
