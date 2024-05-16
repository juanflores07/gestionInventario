<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

        // Indica el nombre de la tabla
        protected $table = 'proveedor';

        // Indica los campos que pueden ser asignados
        protected $fillable = [
            'nombre',
            'codigo',
            'direccion',
            'telefono',
            'nit'
        ];
    
        // Desactiva las marcas de tiempo automáticas
        public $timestamps = false;
}
