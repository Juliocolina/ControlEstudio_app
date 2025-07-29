<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trayecto;
use Illuminate\Support\Str;

class TrayectoSeeder extends Seeder
{
    public function run(): void
    {
        $trayectos = [
            ['nombre' => 'I', 'slug' => 'primero', 'descripcion' => 'Primer trayecto académico.'],
            ['nombre' => 'II', 'slug' => 'segundo', 'descripcion' => 'Segundo trayecto del plan de estudio.'],
            ['nombre' => 'III', 'slug' => 'tercero', 'descripcion' => 'Tercer trayecto, enfoque práctico intensivo.'],
            ['nombre' => 'IV', 'slug' => 'cuarto', 'descripcion' => 'Último trayecto antes de pasantías o tesis.'],
        ];

        foreach ($trayectos as $trayecto) {
            Trayecto::create($trayecto);
        }
    }
}
