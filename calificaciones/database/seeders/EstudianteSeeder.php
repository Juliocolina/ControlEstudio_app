<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Estudiante;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'estudiante@gmail.com')->first();

        if ($user) {
            Estudiante::create([
                'user_id' => $user->id,
                'cedula' => $user->cedula,
                'nombre' => 'Estudiante Beta',
                'apellido' => 'Apellidos Genéricos',
                'fecha_nacimiento' => '2004-02-15', // Puedes modificar este dato realista
                'correo' => $user->email,
                'codigo_estudiante' => 'INF-EST-001',
                'aldea_id' => 1,
                'pnf_id' => 1,
                'trayecto_id' => 1,
                'trimestre_id' => 1,
                'estado_academico' => 'activo',
            ]);
        }    }
}
