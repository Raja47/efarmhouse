<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmhouse extends Model
{

    public function images(){
    	return $this->morphMany(Image::class, 'imageable');	
    } 

}
