<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
	use SoftDeletes;
	protected $table="cities";

	public function farmhouses(){
		return $this->hasMany('App\Farmhouse');
	}
}
