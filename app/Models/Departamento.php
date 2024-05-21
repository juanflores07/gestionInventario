<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamento';

    protected $primaryKey = 'id_departamento';

    protected $fillable = ['nombre', 'id_pais'];

    // Relación con el modelo Pais
    public function pais()
    {
        return $this->belongsTo(Pais::class, 'id_pais', 'id_pais');
    }
}
