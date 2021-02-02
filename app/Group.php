<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Group extends Model implements HasMedia
{

    use SoftDeletes, InteractsWithMedia;

     protected $fillable = [ 'title' , 'slug' ,'description' , 'featured' , 'status'   ];

    protected $casts = [
        'featured' => 'boolean',
        'status'   => 'boolean'
    ];

    public function farmhouses(){
    	return $this->hasMany('App\Farmhouse');
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
