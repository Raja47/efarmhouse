<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Farmhouse;

class FarmhouseController extends Controller
{
	
	public function index(){
		
		$farmHouses = Farmhouse::all();
        $featuredFarmHouse = Farmhouse::with('facilities')->where('featured',1)->get();
        $featuredCities =  City::where('featured',1)->get();

        return view('home',['farmHouses' => $farmHouses , 'featuredFarmHouse'=> $featuredFarmHouse , 'featuredCities' =>$featuredCities ]);
	}

}
