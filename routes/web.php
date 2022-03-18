<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
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

//rutas para inserción de usuarios ↓

Route::get('/usuarios/{id}/delete',[UsuarioController::class,'destroy']);
Route::resource('/usuarios',UsuarioController::class);

//rutas para inserción de usuarios ↑


Route::get('/', [LoginController::class, 'login']); 
Route::post('/', [LoginController::class, 'check_login']);

Route::get('dashboard', function () {
    return view('dashboard');
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
Route::resource('usuarios', 'App\Http\Controllers\UsuarioController');

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
