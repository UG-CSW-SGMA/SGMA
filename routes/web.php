<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas
| las rutas son cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo grandioso! 
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('dashboard', function () {
    return view('dashboard');
});


Route::get('/gestionODA', function () {
    return view('taller.gestionODA');
});

/*@Rafael1108 creo ruta personalida que apunta a la funcion del del CategoriaController para mostrar modal de eliminar*/
Route::get('categorias/{id}/del', 'App\Http\Controllers\CategoriaController@del');


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
