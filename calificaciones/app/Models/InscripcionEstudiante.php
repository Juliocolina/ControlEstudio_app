<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InscripcionEstudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'pnf_uc_trayect_trim_id',
        'estado',
        'intentos',
    ];

    // 🔗 Relación con Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    // 🔗 Relación con la fase académica específica
    public function pnfUcTrayectTrim()
    {
        return $this->belongsTo(PnfUcTrayectTrim::class);
    }

    // 🎯 Helper para saber a qué UC está inscrito
    public function materia()
    {
        return $this->pnfUcTrayectTrim->materia;
    }

    // 🎯 Helper para acceder al PNF directo
    public function pnf()
    {
        return $this->pnfUcTrayectTrim->pnf;
    }
}
