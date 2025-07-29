<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pnf; // Asegúrate de importar tu modelo Pnf

class PnfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pnfs = [
            [
                'nombre' => 'Ingeniería en Informática',
                'codigo' => 'INF-01',
                'descripcion' => 'Programa Nacional de Formación en Ingeniería en Informática.',
            ],
            [
                'nombre' => 'Gestión Ambiental',
                'codigo' => 'GA-02',
                'descripcion' => 'Programa Nacional de Formación en Gestión Ambiental.',
            ],
            [
                'nombre' => 'Educación Integral',
                'codigo' => 'EI-03',
                'descripcion' => 'Programa Nacional de Formación en Educación Integral.',
            ],
        ];

        foreach ($pnfs as $pnfData) {
            // Usamos firstOrCreate para evitar duplicados si el seeder se ejecuta varias veces.
            // Busca por 'nombre' y si no lo encuentra, lo crea con todos los datos.
            Pnf::firstOrCreate(
                ['nombre' => $pnfData['nombre']],
                $pnfData
            );
        }

        $this->command->info('PNFs insertados o actualizados correctamente.');
    }
}

