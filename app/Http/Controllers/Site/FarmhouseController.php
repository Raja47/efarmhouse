<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FarmhouseController extends Controller
{
	
	public function index(){
		return view('home');
	}

}
