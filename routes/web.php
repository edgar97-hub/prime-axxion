<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NosotrosController;

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
  Route::get('/searchSection/{vendor}', [App\Http\Controllers\NosotrosController::class, 'searchSection']);
 

  Route::get('nosotrosdetalles/{id}/section',     [App\Http\Controllers\NosotrosdetalleController::class, 'section'])->name('nosotrosdetalles.section');

  Route::get('nosotrosdetalles/{id}/createourimformation',     [App\Http\Controllers\NosotrosdetalleController::class, 'createourimformation'])->name('nosotrosdetalles.createourimformation');

  Route::get('nosotrosdetalles/{id}/showTextImg',     [App\Http\Controllers\NosotrosdetalleController::class, 'showTextImg'])->name('nosotrosdetalles.showTextImg');
  Route::get('nosotrosdetalles/{id}/editTextImg',     [App\Http\Controllers\NosotrosdetalleController::class, 'editTextImg'])->name('nosotrosdetalles.editTextImg');


  Route::get('solutions/{id}/getView',     [App\Http\Controllers\SolutionController::class, 'getView'])->name('solutions.getView');

  Route::get('solutions/{id}/showCard',     [App\Http\Controllers\SolutionController::class, 'showCard'])->name('solutions.showCard');


  Route::get('solutions/{id}/createCard',     [App\Http\Controllers\SolutionController::class, 'createCard'])->name('solutions.createCard');

  Route::get('solutions/{id}/editCard',     [App\Http\Controllers\SolutionController::class, 'editCard'])->name('solutions.editCard');

  Route::post('solutions/storeCard',[App\Http\Controllers\SolutionController::class, 'storeCard'])->name('solutions.storeCard');

  Route::put('solutions/{id}/updateCard',     [App\Http\Controllers\SolutionController::class, 'updateCard'])->name('solutions.updateCard');

  Route::delete('solutions/{id}/destroyCard',     [App\Http\Controllers\SolutionController::class, 'destroyCard'])->name('solutions.destroyCard');

  Route::resource('nosotrosdetalles', App\Http\Controllers\NosotrosdetalleController::class);
  Route::resource('nosotros', App\Http\Controllers\NosotrosController::class);
  Route::resource('calltoActions', App\Http\Controllers\CalltoActionController::class);
//Route::resource('takeAxxions', App\Http\Controllers\TakeAxxionController::class);
  Route::resource('ayudas', App\Http\Controllers\AyudaController::class);
  Route::resource('banners', App\Http\Controllers\BannerController::class);
  Route::resource('solutions', App\Http\Controllers\SolutionController::class);

  Route::get('imgs/{id}/getTextImg',     [App\Http\Controllers\ImgController::class, 'getTextImg'])->name('imgs.getTextImg');

  Route::get('imgs/{id}/createTextImg',     [App\Http\Controllers\ImgController::class, 'createTextImg'])->name('imgs.createTextImg');

  Route::resource('imgs', App\Http\Controllers\ImgController::class);

   
  Route::resource('customerInquiries', App\Http\Controllers\CustomerInquiriesController::class);

  Route::resource('takeAxxions', App\Http\Controllers\TakeAxxionController::class);


  Route::resource('categories', App\Http\Controllers\categoryController::class);

  Route::post('images',[App\Http\Controllers\TakeAxxionController::class, 'storeImg'])->name('images.store');

});


 








