<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', ['productos' => $productos]); 
    }

    public function nuevo()
    {
        $proveedores = Proveedores::all();
        return view('productos.nuevo', ['proveedores'=>$proveedores]); 
    }

    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        //Tiene que llevar el mismo nombre que tiene en la columna en la tabla, si no, no lo reconoce
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:50',
            'cantidad' => 'required|integer',
            'descripcion' => 'required|string|max:100',
            'fecha_ingreso' => 'required|date',
            'fecha_vencimiento' => 'nullable|date',
            'precio' => 'required|numeric',
            'id_proveedor' => 'required|exists:proveedor,id_proveedor',
        ]);

        // Generar el código del producto automáticamente
        $nombre_corto = strtoupper(substr($validatedData['nombre'], 0, 3));
        $proveedor = Proveedores::findOrFail($validatedData['id_proveedor']);
        $nombre_proveedor_corto = strtoupper(substr($proveedor->nombre, 0, 4));

        $codigo_base = $nombre_corto . '-' . $nombre_proveedor_corto . '-';

        $ultimo_producto = Producto::where('codigo', 'like', $codigo_base . '%')->orderBy('id_producto', 'desc')->first();
        $ultimo_numero_secuencia = $ultimo_producto ? intval(substr($ultimo_producto->codigo, -4)) : 0;
        $nuevo_numero_secuencia = $ultimo_numero_secuencia + 1;

        $codigo_producto = $codigo_base . str_pad($nuevo_numero_secuencia, 4, '0', STR_PAD_LEFT);

        // Agregar el código al array validado
        $validatedData['codigo'] = $codigo_producto;

        // Crear y guardar el nuevo producto
        Producto::create($validatedData);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('productos')->with('success', 'Producto creado correctamente');
    }

    
}
