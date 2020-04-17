<?php

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
    return view('/index');
});

Route::get('/screen', function () {
    return view('/screen');
});
Route::get('/screen/{id}', 'ScreenController@show');

Route::get('/style-guide', function () {
    return view('/style-guide');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/home', function () {
    return view('auth.home');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('auth.dashboard');
})->middleware('auth');

Auth::routes();
