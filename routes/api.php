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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');
Route::get('/boletos/', 'App\Http\Controllers\BoletosController@getBoletos');
Route::get('/boletosevent/{id}', 'App\Http\Controllers\BoletosController@getBoletosforEvent');
Route::get('/events/', 'App\Http\Controllers\EventsController@getEvents');
Route::post('buyers', 'App\Http\Controllers\BuyersController@createBuyers');

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');

});