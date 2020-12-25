<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends Model
{
    use SoftDeletes;
    protected $table = 'seo';

    public function farmhouse(){
    	return $this->belongsTo('App\Farmhouse');
    }
}
