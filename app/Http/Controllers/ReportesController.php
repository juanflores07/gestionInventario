<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function productosRecientes()
    {
    // Obtener la fecha de una semana atrás
    $semanaAnterior = Carbon::now()->subWeek();

    $productos = Producto::where('estado', 1)
        ->whereBetween('fecha_ingreso', [$semanaAnterior, Carbon::now()])
        ->orderBy('id_producto', 'desc')
        ->get();

        return view('reportes.productosRecientes', ['productos' => $productos]); 
    }

    public function productosRetirados()
    {
        $productos = Producto::where('estado', 2)
        ->whereBetween('fecha_retiro', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
        ->orderBy('id_producto', 'desc')
        ->get();   

        return view('reportes.productosRetirados', ['productos' => $productos]); 
    }
}
