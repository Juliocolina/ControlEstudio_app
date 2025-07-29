<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PnfUcTrayTrim extends Model
{
    use HasFactory;

    protected $fillable = [
        'pnf_id',
        'materia_id',
        'trayecto_id',
        'trimestre_id',
        'duracion',
        'codigo',
    ];

    // 🔗 Relaciones
    public function pnf()
    {
        return $this->belongsTo(Pnf::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function trayecto()
    {
        return $this->belongsTo(Trayecto::class);
    }

    public function trimestre()
    {
        return $this->belongsTo(Trimestre::class);
    }

    // 🔗 Posible relación futura: asignaciones docentes
    // public function asignaciones()
    // {
    //     return $this->hasMany(AsignacionDocente::class);
    // }
}
