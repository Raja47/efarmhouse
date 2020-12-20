<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Db_test extends Controller
{
    function select(){
    	return DB::table('settings')->get();
    }
}
