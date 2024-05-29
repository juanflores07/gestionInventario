<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre',
        'codigo',
        'cantidad',
        'descripcion',
        'fecha_ingreso',
        'fecha_vencimiento',
        'precio',
        'id_proveedor',
        'estado',
        'fecha_retiro'
    ];

    // Relación con el modelo Proveedores
    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'id_proveedor', 'id_proveedor');
    }

    //Para que no quiera meter valores en las columas generadas automaticamente por Laravel que son: created_at y updated_at
    public $timestamps = false;

}
