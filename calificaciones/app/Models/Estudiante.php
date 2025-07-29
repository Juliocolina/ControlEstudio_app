<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'correo',
        'telefono',
        'aldea_id',
        'pnf_id',
        'trayecto_id',
        'trimestre_id',
        'codigo_estudiante',
        'estado_academico',
        'observaciones',
        'fecha_ingreso',
        'fecha_graduacion',
        'foto',
        'direccion',
        'nacionalidad',
        'genero',
        'religion',
        'etnia',
        'discapacidad',
        'nivel_estudio',
        'institucion_procedencia',
    ];

    // 🔗 Relación con el Usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 🔗 Relación con la Aldea
    public function aldea()
    {
        return $this->belongsTo(Aldea::class);
    }

    // 🔗 Relación con el PNF
    public function pnf()
    {
        return $this->belongsTo(Pnf::class);
    }

    // 🔗 Relación con Trayecto
    public function trayecto()
    {
        return $this->belongsTo(Trayecto::class);
    }

    // 🔗 Relación con Trimestre
    public function trimestre()
    {
        return $this->belongsTo(Trimestre::class);
    }

    // 🔗 Inscripciones (uno a muchos)
    public function inscripciones()
    {
        return $this->hasMany(InscripcionEstudiante::class);
    }
}
