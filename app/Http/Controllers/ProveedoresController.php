<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function index()
    {
        return view('proveedores.index'); 
    }

    public function nuevo()
    {

        return view('proveedores.nuevo'); 
    }
}
