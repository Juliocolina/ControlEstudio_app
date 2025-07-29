<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';

    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'titulo',
        'especialidad',
        'activo',
    ];

    // Relaciones

    public function cargasDocentes()
    {
        return $this->hasMany(CargaDocente::class, 'profesor_id');
    }

    // Si luego se relaciona con Usuario (para login):
    // public function usuario()
    // {
    //     return $this->hasOne(User::class, 'profesor_id');
    // }
}

