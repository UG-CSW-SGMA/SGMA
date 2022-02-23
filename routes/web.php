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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('/usuarios', function () {
    return view('parametros.usuarios');
});

Route::get('/gestionODA', function () {
    return view('taller.gestionODA');
});




/*
|--------------------------------------------------------------------------
| Controllers routes
|--------------------------------------------------------------------------
|
*/

/*
 * Parametros 
 */
Route::resource('servicios', 'App\Http\Controllers\TipoServicioController');

/*
 * Inventario
 */

Route::resource('categorias', 'App\Http\Controllers\CategoriaController');
Route::resource('productos', 'App\Http\Controllers\ProductoController');

/*
 * Taller
 */
Route::resource('clientes', 'App\Http\Controllers\ClienteController');
Route::resource('vehiculos', 'App\Http\Controllers\VehiculoController');
