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
Route::resource('secciones', App\Http\Controllers\SeccioneController::class);
Route::resource('productos', App\Http\Controllers\ProductoController::class);
Route::resource('categorias', App\Http\Controllers\CategoriaController::class);
Route::resource('disenos', App\Http\Controllers\DisenoController::class);
Route::resource('disenos_categorias', App\Http\Controllers\ProductosCategoriaController::class);
// url productos
Route::get('/producto/{id}/{nombre}', 'App\Http\Controllers\ProductoController@index')->name('producto.index');
Route::get('/cat_pro/{id}', 'App\Http\Controllers\ProductoController@cat_pro')->name('producto.cat_pro');
Route::put('/updatecatpro/{id}', 'App\Http\Controllers\ProductoController@updatecatpro')->name('producto.updatecatpro');
// diseno
Route::get('/diseno/{id}/{nombre}', 'App\Http\Controllers\DisenoController@index')->name('diseno.index');
// inicio
Route::get('/', 'App\Http\Controllers\SeccioneController@inicio')->name('carruseles.inicio');
Route::get('/', 'App\Http\Controllers\SeccioneController@inicio')->name('carruseles.inicio');
// Route::view('/', 'home')->name('home');
Auth::routes();
