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

Route::get('/vehiculos', function () {
    return view('taller.vehiculos');
});

Route::get('/inventarios', function () {
    return view('inventario.inventarios');
});

Route::get('/clientes', function () {
    return view('taller.clientes');
});

/*
|--------------------------------------------------------------------------
| Controllers routes
|--------------------------------------------------------------------------
|
*/
Route::resource('categorias', 'App\Http\Controllers\CategoriaController');
