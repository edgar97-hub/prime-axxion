<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BannerAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API\SolutionAPIController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/banners', [BannerAPIController::class, 'index']);
Route::get('/banners/{id}', [BannerAPIController::class, 'show']);
Route::post('/banners',[BannerAPIController::class,'store']);
Route::put('/banners/{id}',[BannerAPIController::class,'update']);
Route::delete('/banners/{id}',[BannerAPIController::class,'delete']);

Route::get('/solutions', [SolutionAPIController::class, 'index']);
Route::get('/solutions/{id}', [SolutionAPIController::class, 'show']);
Route::post('/solutions',[SolutionAPIController::class,'store']);
Route::put('/solutions/{id}',[SolutionAPIController::class,'update']);
Route::delete('/solutions/{id}',[SolutionAPIController::class,'delete']);




