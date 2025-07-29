<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trimestre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // Relación con PnfTrayTrim
    public function pnfTrayTrim()
    {
        return $this->hasMany(PnfTrayTrim::class);
    }

    // Si decides conectar materias directamente al trimestre:
    // public function materias()
    // {
    //     return $this->hasMany(Materia::class);
    // }
}
