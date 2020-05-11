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

Route::get('/', function () {
    return view('index');
});

Route::get('/protect', function() {
    return view('protect');
});
Route::get('/about', function() {
    return view('about');
});

Route::get('/doctors', function() {
    return view('doctors');
});

Route::get('/news', function() {
    return view('news');
});

Route::get('/map', function() {
    return view('map');
});