<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trayecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'slug',
        'descripcion',
    ];

    // Relación con PnfTrayTrim (si usas esa tabla intermedia)
    public function pnfTrayTrim()
    {
        return $this->hasMany(PnfTrayTrim::class);
    }

    // Si más adelante decides enlazar materias directamente:
    // public function materias()
    // {
    //     return $this->hasMany(Materia::class);
    // }
}
