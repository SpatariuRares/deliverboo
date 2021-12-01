<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

// Rotta che gestirà la vista delle categories dell'utente generico
//Route::resource("/categories", "CategoryController");

Route::middleware('auth')->namespace('user')->prefix('user')->name('user.')
->group(function(){
    //pagina di atterraggio dopo il login (con il prefix, l'url è /admin)
    Route::resource('/orders', 'OrderController');
    Route::resource('/foods', 'FoodController');
    Route::resource('/restaurant', 'UserController');
    
});

// Route::get('/', 'HomeController@index')->name('home');

Route::resource('/categories', 'CategoryController');
Route::resource('/orders', 'OrderController');


Route::get('/', 'UserController@index')->name('index');
Route::get('/{slug}', 'UserController@show')->name('show');



/*Route::get('/', 'UserController@index')->name('index');
Route::get('/{slug}', 'UserController@show')->name('show');*/