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
Route::get('/diseno/{id}/{nombre}', 'App\Http\Controllers\DisenoController@index')->name('diseno.index');

Route::view('/', 'home')->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
