<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExtraInfo extends Model
{
	use SoftDeletes;
	protected $table="extra_info";
}
