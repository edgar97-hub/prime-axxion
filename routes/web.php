<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
  
  Route::get('/home',       [HomeController::class, 'index'])->name('home');
  Route::resource('users',  UserController::class);
  Route::resource('roles',  RoleController::class);
});

// Route::group(['middleware' => ['auth'],'middleware' => ['permission:Manage-Users']], function () {

// });
// Route::group(['middleware' => ['auth'],'middleware' => ['permission:Manage-Roles']], function () {
// });


Route::resource('calltoActions', App\Http\Controllers\CalltoActionController::class);
Route::resource('takeAxxions', App\Http\Controllers\TakeAxxionController::class);
Route::resource('ayudas', App\Http\Controllers\AyudaController::class);
