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

    Route::resource('students', 'APi\v1\StudentController');
    Route::patch('students', 'APi\v1\StudentController@store');
    Route::get('students', 'APi\v1\StudentController@index');
    Route::delete('students', 'APi\v1\StudentController@destroy');
    // Route::get('student', 'APi\v1\StudentController@update');
    Route::put('students/{id}', 'APi\v1\StudentController@update');
