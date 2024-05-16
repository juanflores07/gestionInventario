<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Indica el nombre de la tabla
    protected $table = 'producto';


    // Indica los campos que pueden ser asignados
    protected $fillable = [
        'codigo',
        'nombre',
        'fechaIngreso',
        'fechaVencimiento',
        'cantidad',
        'precio',
        'idProveedor'

    ];

    // Desactiva las marcas de tiempo automáticas
    public $timestamps = false;
}
