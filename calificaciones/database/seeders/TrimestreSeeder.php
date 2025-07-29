<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trimestre;

class TrimestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $trimestres = [
            [
                'nombre' => 'Trimestre I',
                'fecha_inicio' => '2025-01-15',
                'fecha_fin' => '2025-04-15',
                'descripcion' => 'Inicio del ciclo académico.'
            ],
            [
                'nombre' => 'Trimestre II',
                'fecha_inicio' => '2025-05-01',
                'fecha_fin' => '2025-07-31',
                'descripcion' => 'Desarrollo medio del trayecto.'
            ],
            [
                'nombre' => 'Trimestre III',
                'fecha_inicio' => '2025-09-01',
                'fecha_fin' => '2025-11-30',
                'descripcion' => 'Cierre del ciclo académico.'
            ],
        ];

        foreach ($trimestres as $trimestre) {
            Trimestre::create($trimestre);
        }
    }
}
