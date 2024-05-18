<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use App\Models\Pais;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function index()
    {
        $proveedores = Proveedores::all();
        return view('proveedores.index', ['proveedores' => $proveedores]); 
    }

    public function nuevo()
    {
        $paises = Pais::all();

        return view('proveedores.nuevo', [
            'paises' => $paises
        ]); 
    }

    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        //Tiene que llevar el mismo nombre que tiene en la columna en la tabla, si no, no lo reconoce
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:50',
            'direccion' => 'required|string|max:100',
            'telefono' => 'required|string|max:15',
            'nit' => 'required|string|max:17',
            'id_municipio' => 'required|exists:municipio,id_municipio',
        ]);

        // Crear y guardar la nueva entidad
        Proveedores::create($validatedData);

        // Redireccionar o realizar alguna otra acción
        return redirect()->route('proveedores')->with('success', 'Proveedor creado correctamente');
    }

    public function obtenerDepartamento(Request $request)
    {
        $idPais = $request->input('idPais');
        
        if ($idPais != null) {
            $departamentos = Departamento::where('id_pais', $idPais)->orderBy('nombre', 'ASC')->get();
        } else {
            $departamentos = collect();
        }

        if ($departamentos->isEmpty()) {
            $response = array("code" => 100);
        } else {
            $html = "<option value=''>Seleccione el departamento...</option>";
            foreach ($departamentos as $departamento) {
                $html .= "<option value='" . $departamento->id_departamento . "'>" . $departamento->nombre . "</option>";
            }
            
            $response = array("code" => 200, "departamento" => $html);
        }
        return response()->json($response);
    }

    public function obtenerMunicipio(Request $request)
    {
        $idDepartamento = $request->input('idDepartamento');
        
        if($idDepartamento != null){
            $municipio = Municipio::where('id_departamento', $idDepartamento)->orderBy('nombre', 'ASC')->get();
        }
        else{
            $municipio = collect();
        }

        if($municipio->isEmpty()) {
            $municipio = array("code" => 100);
        }
        else{
            $html = "<option value=''>Seleccione el municipio...</option>";
            foreach ($municipio as $municipio) {
                $html .= "<option value='".$municipio->id_municipio."'>".$municipio->nombre."</option>";
            }
            
            $response = array("code" => 200, "municipio" => $html);
        }
        return response()->json($response);
    }
}
