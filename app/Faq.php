<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Faq extends Model
{
    use SoftDeletes;	

    public function farmhouse(){
    	return $this->belongsTo('App\Farmhouse');
    }	
}
