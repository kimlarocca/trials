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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('questions', 'QuestionsController@index');
Route::get('questions/{question}', 'QuestionsController@show');
Route::get('trial-questions/{question}', 'QuestionsController@questions');
Route::post('questions', 'QuestionsController@store');
Route::put('questions/{question}', 'QuestionsController@update');
Route::delete('questions/{question}', 'QuestionsController@delete');

Route::get('patients', 'PatientsController@index');
Route::get('patients/{patient}', 'PatientsController@show');
Route::post('patients', 'PatientsController@store');
Route::put('patients/{patient}', 'PatientsController@update');
Route::delete('patients/{patient}', 'PatientsController@delete');

Route::get('trials', 'TrialsController@index');
Route::get('trials/{trial}', 'TrialsController@show');
Route::post('trials', 'TrialsController@store');
Route::put('trials/{trial}', 'TrialsController@update');
Route::delete('trials/{trial}', 'TrialsController@delete');
