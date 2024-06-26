<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::where('estado', '=', 1)
        ->orderBy('id_producto', 'desc')
        ->get();   

        return view('productos.index', ['productos' => $productos]); 
    }

    public function nuevo()
    {
        $proveedores = Proveedores::all();
        return view('productos.nuevo', ['proveedores'=>$proveedores]); 
    }

    public function ver($id_producto)
    {
        $producto = Producto::find($id_producto);
        return view('productos.ver', ['producto' => $producto]); 

    }

    public function editar($id_producto)
    {
        $proveedores = Proveedores::all();
        $producto = Producto::find($id_producto);
        return view('productos.editar', ['producto' => $producto, 'proveedores'=>$proveedores]); 

    }

    public function eliminar($id_producto)
    {
        $producto = Producto::findOrFail($id_producto);
        $codigo = $producto->codigo;

        // Eliminar el producto
        $producto->delete();

        return redirect()->route('productos')->with('success', "Producto {$codigo} eliminado correctamente");

    }

    public function retirarProducto($id_producto)
    {
        $producto = Producto::findOrFail($id_producto);
        $codigo = $producto->codigo;

        //Darle un estado predefinido (1- Activo, 2-Retirado)
        $validatedData['estado'] = 2;

        $fechaActual = date('Y-m-d'); // Formato de fecha y hora
        $validatedData['fecha_retiro'] = $fechaActual;

        // Actualizar los datos del producto con el nuevo valor de estado
        $producto->update($validatedData);

        return redirect()->route('productos')->with('success', "Producto {$codigo} retirado correctamente");

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
        //Obtiene nombre del producto y toma las primeras 3 letras
        $nombre_corto = strtoupper(substr($this->quitarTildes($validatedData['nombre']), 0, 3));

        //Obtiene nombre del proveedor y toma las primeras 4 letras
        $proveedor = Proveedores::findOrFail($validatedData['id_proveedor']);
        $nombre_proveedor_corto = strtoupper(substr($this->quitarTildes($proveedor->nombre), 0, 4));

        //Construccion código
        $codigo_base = $nombre_corto . '-' . $nombre_proveedor_corto . '-';

        $ultimo_producto = Producto::where('codigo', 'like', $codigo_base . '%')->orderBy('id_producto', 'desc')->first();
        $ultimo_numero_secuencia = $ultimo_producto ? intval(substr($ultimo_producto->codigo, -4)) : 0;
        $nuevo_numero_secuencia = $ultimo_numero_secuencia + 1;

        $codigo_producto = $codigo_base . str_pad($nuevo_numero_secuencia, 4, '0', STR_PAD_LEFT);

        // Agregar el código al array validado
        $validatedData['codigo'] = $codigo_producto;

        //Darle un estado predefinido (1- Activo, 2-Retirado)
        $validatedData['estado'] = 1;

        // Crear y guardar el nuevo producto
        $producto = Producto::create($validatedData);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('productos')->with('success', "Producto {$producto->codigo} creado correctamente");
    }

    public function guardarEdicion($id_producto, Request $request)
    {
        $producto = Producto::findOrFail($id_producto);

        $codigoViejo = $producto->codigo;
        $codigoSinEspacio = trim($codigoViejo);
        $codigoSinNumero = substr($codigoSinEspacio, 0, 9); // Obtener los primeros 9 caracteres

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
        //Obtiene nombre del producto y toma las primeras 3 letras
        $nombre_corto = strtoupper(substr($this->quitarTildes($validatedData['nombre']), 0, 3));

        //Obtiene nombre del proveedor y toma las primeras 4 letras
        $proveedor = Proveedores::findOrFail($validatedData['id_proveedor']);
        $nombre_proveedor_corto = strtoupper(substr($this->quitarTildes($proveedor->nombre), 0, 4));

        //Construccion código
        $codigo_base = $nombre_corto . '-' . $nombre_proveedor_corto . '-';

        if($codigoSinNumero == $codigo_base){
            //Nada, que mantenga el mismo codigo
            $codigo_producto = $codigoViejo;
        }else{
            $ultimo_producto = Producto::where('codigo', 'like', $codigo_base . '%')->orderBy('id_producto', 'desc')->first();
            $ultimo_numero_secuencia = $ultimo_producto ? intval(substr($ultimo_producto->codigo, -4)) : 0;
            $nuevo_numero_secuencia = $ultimo_numero_secuencia + 1;
    
            $codigo_producto = $codigo_base . str_pad($nuevo_numero_secuencia, 4, '0', STR_PAD_LEFT);
        }

        // Agregar el código al array validado
        $validatedData['codigo'] = $codigo_producto;

        // Actualizar los datos del producto con los nuevos valores del formulario
        $producto->update($validatedData);

        if($codigoSinNumero == $codigo_base)
        {
            return redirect()->route('productos')->with('success', "Producto {$producto->codigo} editado correctamente");
        }else{
            return redirect()->route('productos')->with('success', "Producto con código anterior {$codigoViejo} fue editado correctamente a {$producto->codigo}");
        }
    
    }

    public static function quitarTildes($texto) {
        // Primero, convierte el texto a minúsculas
        $texto = mb_strtolower($texto, 'UTF-8');
    
        // Reemplaza las letras con tilde por su equivalente sin tilde
        $texto = str_replace(
            ['á', 'é', 'í', 'ó', 'ú', 'ü'],
            ['a', 'e', 'i', 'o', 'u', 'u'],
            $texto
        );
    
        // Convierte el texto nuevamente a mayúsculas
        $texto = mb_strtoupper($texto, 'UTF-8');
    
        return $texto;
    }   
    
}
