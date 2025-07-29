<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PnfTrayTrim extends Model
{
    use HasFactory;

    protected $fillable = [
        'pnf_id',
        'trayecto_id',
        'trimestre_id',
    ];

    // 🔗 Relación con PNF
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

    // 🔗 Opcional: UC asignadas dentro de esta fase (si lo usas como referencia externa)
    // public function unidadesCurricularesAsignadas()
    // {
    //     return $this->hasMany(PnfUcTrayectTrim::class); // si en el futuro lo enlazas desde aquí
    // }
}
