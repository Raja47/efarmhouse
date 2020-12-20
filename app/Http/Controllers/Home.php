<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\farmhouse;

class Home extends Controller
{
	

	function index(){

		$data = farmhouse::all();
	//	echo "<pre>";
	//	print_r($data['id']);
	//	echo "</pre>";
//var_dump($data);


		return view('home',array('datas'=>$data));
	}    
}
