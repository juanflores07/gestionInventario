<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        //$productos = Producto::all(); // Obtener todos los productos desde el modelo (requiere el modelo Producto importado)
        $arrayVacio = [];
        return view('productos.index', ['productos' => $arrayVacio]); 
    }

    public function nuevo()
    {
        $proveedores = [];

        $proveedores[] = ['id' => 1, 'nombre' => 'Proveedor 1'];
        $proveedores[] = ['id' => 2, 'nombre' => 'Proveedor 2'];
        $proveedores[] = ['id' => 3, 'nombre' => 'Proveedor 3'];
        $proveedores[] = ['id' => 4, 'nombre' => 'Proveedor 4'];
        $proveedores[] = ['id' => 5, 'nombre' => 'Proveedor 5'];

        return view('productos.nuevo', ['proveedores'=>$proveedores]); 
    }
}
