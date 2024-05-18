<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ReportesController;



Route::get('/', function () {
    return view('principal.index');
})->name('principal');


Route::get('/productos', [ProductoController::class, 'index'])->name('productos');

Route::get('/productos/nuevo', [ProductoController::class, 'nuevo'])->name('nuevo_producto');

Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores');

Route::get('/proveedores/nuevo', [ProveedoresController::class, 'nuevo'])->name('nuevo_proveedor');

Route::post('/proveedores/guardar', [ProveedoresController::class, 'guardar'])->name('guardar_proveedor');

Route::post('/productos/guardar', [ProductoController::class, 'guardar'])->name('guardar_producto');

Route::post('/proveedor/buscarDepartamento', [ProveedoresController::class, 'obtenerDepartamento'])->name('buscar_departamento');

Route::post('/proveedor/buscarMunicipio', [ProveedoresController::class, 'obtenerMunicipio'])->name('buscar_municipio');

Route::get('/reportes/productosRecientes', [ReportesController::class, 'productosRecientes'])->name('productos_recientes');

Route::get('/reportes/productosRetirados', [ReportesController::class, 'productosRetirados'])->name('productos_retirados');

