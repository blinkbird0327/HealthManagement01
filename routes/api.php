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


Route::get('/getName', "HealthController@getName"); //新增資料到DB

Route::get('/getData', [\App\Http\Controllers\HealthController::class,'getData']);

Route::get('/getWeight', [\App\Http\Controllers\HealthController::class,'getWeight']);

Route::get('/editData', [\App\Http\Controllers\HealthController::class,'editData']);

Route::get('/getAllData', [\App\Http\Controllers\HealthController::class,'getAllData']);

Route::get('/getUserData', [\App\Http\Controllers\HealthController::class,'getUserData']);
