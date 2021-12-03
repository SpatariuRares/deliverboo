<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/generate', 'Api\paymentController@generate')->name('generate');

Route::post('/food/cart', 'Api\paymentController@foodOrder')->name('foodOrder');

//Route::get('/makepayment', 'Api\paymentController@makePayment')->name('makepayment');
Route::post('/makepayment', 'Api\paymentController@makePayment')->name('makepayment');

Route::get('/{slug}/foods', 'Api\FoodController@index');
Route::get('/restaurant', 'Api\RestaurantController@index');
Route::get('/categoryShow/{id}', 'Api\RestaurantController@show')->name('category_show');
