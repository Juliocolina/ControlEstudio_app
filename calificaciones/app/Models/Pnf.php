<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pnf extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo',
        'descripcion',
    ];

    // 🔗 Relación: Un PNF tiene muchas unidades curriculares
    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
}
