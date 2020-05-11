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

// CALL THIS ROUTE ONLY TO UPDATE THE DATA. IT WILL THROW ERROR IF THERE IS NO DATA
Route::get('/update-india-data','ApiController@UpdateIndiaData');

Route::get('/update-state-data','ApiController@UpdateStatesData');
