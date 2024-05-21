<?php

namespace App\Http\Controllers;

use App\Models\Departamento;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamento.index', ['departamentos' => $departamentos]); 
    }
}
