<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodos';

    protected $fillable = [
        'nombre',
        'inicio',
        'fin',
        'activo',
    ];

    // Relaciones

    public function cargasDocentes()
    {
        return $this->hasMany(CargaDocente::class, 'periodo_id');
    }

    // Puedes agregar otras relaciones como inscripciones, evaluaciones, etc.
}
