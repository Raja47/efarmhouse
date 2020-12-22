<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Farmhouse extends Model
{

	use SoftDeletes;
	
    public function images(){
    	return $this->morphMany(Image::class, 'imageable');	
    } 

}
