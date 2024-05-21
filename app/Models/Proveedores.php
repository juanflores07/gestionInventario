<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

        protected $table = 'proveedor';

        protected $primaryKey = 'id_proveedor';
    
        protected $fillable = [
            'nombre',
            'telefono',
            'nit',
            'direccion',
            'id_municipio'
        ];    

        // Relación con el modelo Municipio
        public function municipio()
        {
            return $this->belongsTo(Municipio::class, 'id_municipio', 'id_municipio');
        }
    
        //Para que no quiera meter valores en las columas generadas automaticamente por Laravel que son: created_at y updated_at
        public $timestamps = false;

}
