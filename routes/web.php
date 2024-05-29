<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\MunicipioController;

Route::get('/', function () {
    return view('principal.index');
})->name('principal');


//------------------------------------------Producto--------------------------------//
Route::get('/productos', [ProductoController::class, 'index'])->name('productos');

Route::get('/productos/nuevo', [ProductoController::class, 'nuevo'])->name('nuevo_producto');

Route::get('/productos/ver/{id_producto}', [ProductoController::class, 'ver'])->name('ver_producto');

Route::get('/productos/editar/{id_producto}', [ProductoController::class, 'editar'])->name('editar_producto');

Route::post('/productos/guardar', [ProductoController::class, 'guardar'])->name('guardar_producto');

Route::post('/productos/guardarEdicion/{id_producto}', [ProductoController::class, 'guardarEdicion'])->name('guardar_edicion_producto');

Route::post('/productos/eliminar/{id_producto}', [ProductoController::class, 'eliminar'])->name('eliminar_producto');

Route::post('/productos/retirar/{id_producto}', [ProductoController::class, 'retirarProducto'])->name('retirar_producto');


//-------------------------------------------Fin producto-----------------------------------//

//------------------------------------------Proveedor--------------------------------//


Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores');

Route::get('/proveedores/nuevo', [ProveedoresController::class, 'nuevo'])->name('nuevo_proveedor');

Route::post('/proveedores/guardar', [ProveedoresController::class, 'guardar'])->name('guardar_proveedor');

Route::get('/proveedores/ver/{id_proveedor}', [ProveedoresController::class, 'ver'])->name('ver_proveedor');

Route::get('/proveedores/editar/{id_proveedor}', [ProveedoresController::class, 'editar'])->name('editar_proveedor');

Route::post('/proveedores/guardarEdicion/{id_proveedor}', [ProveedoresController::class, 'guardarEdicion'])->name('guardar_edicion_proveedor');

Route::post('/proveedores/eliminar/{id_proveedor}', [ProveedoresController::class, 'eliminar'])->name('eliminar_proveedor');

//-------------------------------------------Fin proveedor-----------------------------------//


//---------------------------------------------Funciones que uso para AJAX------------------------------------------------------//
Route::post('/proveedor/buscarDepartamento', [ProveedoresController::class, 'obtenerDepartamento'])->name('buscar_departamento');

Route::post('/proveedor/buscarMunicipio', [ProveedoresController::class, 'obtenerMunicipio'])->name('buscar_municipio');

//---------------------------------------------Fin funciones que uso para AJAX------------------------------------------------------//

//---------------------------------------------Funciones para reportes------------------------------------------------------//

Route::get('/reportes/productosRecientes', [ReportesController::class, 'productosRecientes'])->name('productos_recientes');

Route::get('/reportes/productosRetirados', [ReportesController::class, 'productosRetirados'])->name('productos_retirados');

//---------------------------------------------Fin funciones para reportes------------------------------------------------------//

//---------------------------------------------Ajustes------------------------------------------------------//

Route::get('/paises', [PaisController::class, 'index'])->name('paises');

Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos');

Route::get('/municipios', [MunicipioController::class, 'index'])->name('municipios');

//---------------------------------------------Fin ajustes------------------------------------------------------//
