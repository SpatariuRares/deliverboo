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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::middleware('auth')->namespace('User')->prefix('User')->name('user.')
->group(function(){
    //pagina di atterraggio dopo il login (con il prefix, l'url è /admin)
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('/categories', 'CategoryController');
    Route::resource('/orders', 'OrderController');
    Route::resource('/foods', 'FoodController');
    
    /* Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/tags', 'TagController');*/
});


Route::get('/home', 'HomeController@index')->name('home');
