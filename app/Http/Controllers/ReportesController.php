<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function productosRecientes()
    {
        return view('reportes.productosRecientes'); 
    }

    public function productosRetirados()
    {
        return view('reportes.productosRetirados'); 
    }
}
