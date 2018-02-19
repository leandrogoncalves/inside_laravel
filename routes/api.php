<?php

use Illuminate\Http\Request;

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


Route::get('/', function () {
    return response()->json(['message' => 'Inside API', 'status' => 'Connected']);;
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('home/quadros-totais','Api\HomeController@getQuadrosTotais');
});


