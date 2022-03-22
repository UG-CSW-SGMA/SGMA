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




/*
|--------------------------------------------------------------------------
| Controllers routes
|--------------------------------------------------------------------------
| 
| Establece el ruteo de los controladores
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

/*
*@Rafael1108 
*Se crea ruta personalida que apunta a la funcion del 
*CategoriaController para mostrar modal de eliminar
*/
Route::get('categorias/{id}/del', 'App\Http\Controllers\CategoriaController@del');
Route::resource('categorias', 'App\Http\Controllers\CategoriaController');
/*
*Se crea ruta personalida que apunta a la funcion del 
*ProductoController para mostrar modal de eliminar
*/
Route::get('productos/{id}/del', 'App\Http\Controllers\ProductoController@del');
Route::resource('productos', 'App\Http\Controllers\ProductoController');

/*
 * Taller
 */
/**
 * @edgarbasurto
 * Ruta de metodo de busqueda Ajax, por DNI
 */
Route::get('clientes/{dni}/getByDNI', 'App\Http\Controllers\ClienteController@getByDNI');


Route::resource('clientes', 'App\Http\Controllers\ClienteController');


Route::resource('vehiculos', 'App\Http\Controllers\VehiculoController');
/*
 * Compras
 */

/*
 *@Rafael1108 
 *Ruteo de metodos de busqueda Ajax, busqueda por DNI
 */
Route::get('proveedores/{DNI}/getByDNI', 'App\Http\Controllers\ProveedorController@getByDNI');

/*
 *@Rafael1108 
 *Se crea ruta personalida que apunta a la funcion del
 *CategoriaController para mostrar modal de eliminar
 */
Route::get('proveedores/{id}/del', 'App\Http\Controllers\ProveedorController@del');

Route::resource('proveedores', 'App\Http\Controllers\ProveedorController');



