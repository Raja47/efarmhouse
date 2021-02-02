<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use TypiCMS\NestableTrait;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class City extends Model implements HasMedia
{
	 use SoftDeletes  ,NestableTrait, InteractsWithMedia;

    protected $table="cities";

    protected $fillable = [ 'title' , 'slug' ,'description' ,'parent_id' ,'featured' , 'status' ,'orders'  ];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(City::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(City::class, 'parent_id');
    }
}
