<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BannerAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API\SolutionAPIController;
use App\Http\Controllers\API\NosotrosdetalleAPIController;
use App\Http\Controllers\API\NosotrosAPIController;
use App\Http\Controllers\API\CalltoActionAPIController;
use App\Http\Controllers\API\TakeAxxionAPIController;
use App\Http\Controllers\API\AyudaAPIController;




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


Route::get('/nosotros', [NosotrosAPIController::class, 'index']);
Route::get('/nosotros/{id}', [NosotrosAPIController::class, 'show']);
Route::post('/nosotros',[NosotrosAPIController::class,'store']);
Route::put('/nosotros/{id}',[NosotrosAPIController::class,'update']);
Route::delete('/nosotros/{id}',[NosotrosAPIController::class,'delete']);

Route::post('/nosotros/detalles',[NosotrosdetalleAPIController::class,'store']);
Route::put('/nosotros/detalles/{id}',[NosotrosdetalleAPIController::class,'update']);
Route::delete('/nosotros/detalles/{id}',[NosotrosdetalleAPIController::class,'delete']);

Route::get('/callto_actions', [CalltoActionAPIController::class, 'index']);
Route::get('/callto_actions/{id}', [CalltoActionAPIController::class, 'show']);
Route::post('/callto_actions',[CalltoActionAPIController::class,'store']);
Route::put('/callto_actions/{id}',[CalltoActionAPIController::class,'update']);
Route::delete('/callto_actions/{id}',[CalltoActionAPIController::class,'delete']);

Route::get('/take_axxions', [TakeAxxionAPIController::class, 'index']);
Route::get('/take_axxions/{id}', [TakeAxxionAPIController::class, 'show']);
Route::post('/take_axxions',[TakeAxxionAPIController::class,'store']);
Route::put('/take_axxions/{id}',[TakeAxxionAPIController::class,'update']);
Route::delete('/take_axxions/{id}',[TakeAxxionAPIController::class,'delete']);

Route::get('/ayudas', [AyudaAPIController::class, 'index']);
Route::get('/ayudas/{id}', [AyudaAPIController::class, 'show']);
Route::post('/ayudas',[AyudaAPIController::class,'store']);
Route::put('/ayudas/{id}',[AyudaAPIController::class,'update']);
Route::delete('/ayudas/{id}',[AyudaAPIController::class,'delete']);

//Route::resource('nosotros', App\Http\Controllers\API\NosotrosAPIController::class);
//Route::resource('nosotrosdetalles',App\Http\Controllers\API\NosotrosdetalleAPIController::class);
//Route::resource('callto_actions', App\Http\Controllers\API\CalltoActionAPIController::class);
//Route::resource('take_axxions', App\Http\Controllers\API\TakeAxxionAPIController::class);
//Route::resource('ayudas', App\Http\Controllers\API\AyudaAPIController::class);
//Route::resource('imgs', App\Http\Controllers\API\ImgAPIController::class);
