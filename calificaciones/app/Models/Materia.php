<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'pnf_id',
        'nombre',
        'codigo',
        'creditos',
        'descripcion',
    ];

    // 🔗 Relación: Una UC pertenece a un PNF
    public function pnf()
    {
        return $this->belongsTo(Pnf::class);
    }
}
