<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materia;
use App\Models\Pnf;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buscar los PNF por nombre
        $informática = Pnf::where('nombre', 'Ingeniería en Informática')->first();
        $ambiental = Pnf::where('nombre', 'Gestión Ambiental')->first();
        $educacion = Pnf::where('nombre', 'Educación Integral')->first();

        // Verificación de existencia
        if (!$informática || !$ambiental || !$educacion) {
            $this->command->warn('Alguno de los PNF definidos no fue encontrado. Verifica el PnfSeeder.');
            return;
        }

        $materias = [
            // Ingeniería en Informática
            [
                'nombre' => 'Programación I',
                'codigo' => 'PROG-101',
                'creditos' => 3,
                'descripcion' => 'Introducción a la programación con énfasis en algoritmos y estructuras de datos.',
                'pnf_id' => $informática->id,
            ],
            [
                'nombre' => 'Bases de Datos',
                'codigo' => 'BD-103',
                'creditos' => 3,
                'descripcion' => 'Diseño y gestión de bases de datos relacionales.',
                'pnf_id' => $informática->id,
            ],
            [
                'nombre' => 'Matemáticas Discretas',
                'codigo' => 'MATD-102',
                'creditos' => 4,
                'descripcion' => 'Estudio de estructuras matemáticas fundamentales para la informática.',
                'pnf_id' => $informática->id,
            ],

            // Gestión Ambiental
            [
                'nombre' => 'Ecología Aplicada',
                'codigo' => 'ECO-201',
                'creditos' => 3,
                'descripcion' => 'Fundamentos ecológicos enfocados en la gestión ambiental.',
                'pnf_id' => $ambiental->id,
            ],
            [
                'nombre' => 'Legislación Ambiental',
                'codigo' => 'LEG-202',
                'creditos' => 2,
                'descripcion' => 'Normativas nacionales e internacionales sobre conservación ambiental.',
                'pnf_id' => $ambiental->id,
            ],

            // Educación Integral
            [
                'nombre' => 'Didáctica General',
                'codigo' => 'DID-301',
                'creditos' => 3,
                'descripcion' => 'Teorías y enfoques de la enseñanza para contextos escolares diversos.',
                'pnf_id' => $educacion->id,
            ],
            [
                'nombre' => 'Psicología del Desarrollo',
                'codigo' => 'PSI-302',
                'creditos' => 4,
                'descripcion' => 'Estudio del desarrollo humano desde la infancia hasta la adultez.',
                'pnf_id' => $educacion->id,
            ],
        ];

        foreach ($materias as $materia) {
            Materia::create($materia);
        }

        $this->command->info('Materias insertadas correctamente y asignadas a sus respectivos PNF.');
    }
}
