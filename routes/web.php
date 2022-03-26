<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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


/**
 * @Andresdavidala
 * Routeo del controlador LogIn
 */
Route::get('/', [LoginController::class, 'login']);
Route::post('/', [LoginController::class, 'check_login']);
Route::get('/logout', [LoginController::class, 'logout']);
//sistema login ↑


Route::get('dashboard', function () {
    return view('dashboard');
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
Route::resource('empresa', 'App\Http\Controllers\EmpresaController');

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
Route::resource('clientes', 'App\Http\Controllers\ClienteController');
Route::resource('vehiculos', 'App\Http\Controllers\VehiculoController');
Route::resource('ordenAtencion', 'App\Http\Controllers\OrdenAtencionController');
/**
 * @edgarbasurto
 * Ruta de metodo de busqueda Ajax, por DNI
 */
Route::get('clientes/{dni}/getByDNI', 'App\Http\Controllers\ClienteController@getByDNI');
/**
 * @edgarbasurto
 * Ruta de metodo de busqueda Ajax, por PLACA
 */
Route::get('vehiculos/{placa}/getByPlaca', 'App\Http\Controllers\VehiculoController@getByPlaca');

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


/*
 * Reportes
 */

/*
 *@Rafael1108 
 *Ruteo de metodos de busqueda Ajax, para presentar reportes
 */
Route::post('reportes/{id}/showReport', 'App\Http\Controllers\ReportesController@showReport');
Route::resource('reportes', 'App\Http\Controllers\ReportesController');
