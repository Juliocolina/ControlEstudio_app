<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aldea;

class AldeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aldeas = [
            [
                'nombre' => 'Aldea Tecnológica Coro',
                'codigo' => 'ATC-001',
                'direccion' => 'Av. Principal, Coro, Estado Falcón',
            ],
            [
                'nombre' => 'Aldea Experimental Punto Fijo',
                'codigo' => 'AEPF-002',
                'direccion' => 'Zona Industrial, Punto Fijo, Estado Falcón',
            ],
            [
                'nombre' => 'Aldea Bolivariana San Gabriel',
                'codigo' => 'ABSG-003',
                'direccion' => 'Calle Real, San Gabriel, Municipio Miranda',
            ],
            // Puedes agregar más aldeas según la estructura que desees
        ];

        foreach ($aldeas as $aldea) {
            Aldea::create($aldea);
        }
    }
}
