<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'administrador'],
            ['name' => 'coordinador'],
            ['name' => 'profesor'],
            ['name' => 'estudiante'],
        ];

        foreach ($roles as $rol) {
            Role::create($rol);
        }
    }
}
