<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaDocente extends Model
{
    use HasFactory;

    protected $table = 'cargas_docentes';

    protected $fillable = [
        'profesor_id',
        'pnf_uc_trayect_trim_id',
        'aldea_id',
        'periodo_id',
        'activo',
    ];

    // Relaciones

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'profesor_id');
    }

    public function unidadCurricular()
    {
        return $this->belongsTo(PnfUcTrayTrim::class, 'pnf_uc_trayect_trim_id');
    }

    public function aldea()
    {
        return $this->belongsTo(Aldea::class, 'aldea_id');
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class, 'periodo_id');
    }
}
