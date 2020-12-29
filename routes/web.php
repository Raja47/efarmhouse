<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::resource('/','HomeController');

//Route::resource('/{slug}/show','HomeController')->name('*','farmHouse.show');

Route::get('/{slug}/show','HomeController@show')->name('farmHouse.show');


// Route::get('/', function () {
//   return view('home');
// });


Route::get('/home', 'Site\FarmhouseController@index');

Route::get('all', function () {
  return view('all_farm_houses');
});

Route::get('contact', function () {
  return view('contact');
});

Route::get('farms', function () {
  return view('farm_detail');
});

Auth::routes(['verify' => true]);

require 'admin.php';


