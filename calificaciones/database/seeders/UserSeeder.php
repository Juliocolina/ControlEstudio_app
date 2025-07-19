<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin Master',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'role_id' => Role::where('name', 'administrador')->first()->id,
            ],
            [
                'name' => 'Coordinador Central',
                'email' => 'coordinador@gmail.com',
                'password' => Hash::make('coordinador123'),
                'role_id' => Role::where('name', 'coordinador')->first()->id,
            ],
            [
                'name' => 'Profesor Clave',
                'email' => 'profesor@gmail.com',
                'password' => Hash::make('profesor123'),
                'role_id' => Role::where('name', 'profesor')->first()->id,
            ],
            [
                'name' => 'Estudiante Beta',
                'email' => 'estudiante@gmail.com',
                'password' => Hash::make('estudiante123'),
                'role_id' => Role::where('name', 'estudiante')->first()->id,
            ],
        ];

        foreach ($users as $usuario) {
            User::create($usuario);
        }
    }
}
