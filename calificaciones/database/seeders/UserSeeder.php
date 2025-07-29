<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role; // Importamos el modelo Role de Spatie si necesitamos buscarlo

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegúrate de que los roles existan antes de intentar asignarlos
        // Es buena práctica ejecutar RolesAndPermissionsSeeder antes que este,
        // o llamarlo desde DatabaseSeeder.php
        $adminRole = Role::where('name', 'administrador')->first();
        $coordinadorRole = Role::where('name', 'coordinador')->first();
        $profesorRole = Role::where('name', 'profesor')->first();
        $estudianteRole = Role::where('name', 'estudiante')->first();

        // Crear y asignar rol al Administrador
        $admin = User::create([
            'name' => 'Admin Master',
            'email' => 'admin@gmail.com',
            'cedula' => '12345678', // Añade una cédula única
            'password' => Hash::make('admin123'),
            'security_questions' => null, // O un array JSON si lo usas
        ]);
        if ($adminRole) {
            $admin->assignRole($adminRole);
        }

        // Crear y asignar rol al Coordinador
        $coordinador = User::create([
            'name' => 'Coordinador Central',
            'email' => 'coordinador@gmail.com',
            'cedula' => '87654321', // Añade una cédula única
            'password' => Hash::make('coordinador123'),
            'security_questions' => null,
        ]);
        if ($coordinadorRole) {
            $coordinador->assignRole($coordinadorRole);
        }

        // Crear y asignar rol al Profesor
        $profesor = User::create([
            'name' => 'Profesor Clave',
            'email' => 'profesor@gmail.com',
            'cedula' => '11223344', // Añade una cédula única
            'password' => Hash::make('profesor123'),
            'security_questions' => null,
        ]);
        if ($profesorRole) {
            $profesor->assignRole($profesorRole);
        }

        // Crear y asignar rol al Estudiante
        $estudiante = User::create([
            'name' => 'Estudiante Beta',
            'email' => 'estudiante@gmail.com',
            'cedula' => '44332211', // Añade una cédula única
            'password' => Hash::make('estudiante123'),
            'security_questions' => null,
        ]);
        if ($estudianteRole) {
            $estudiante->assignRole($estudianteRole);
        }

        // Puedes añadir más usuarios si lo necesitas
    }
}
