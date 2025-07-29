<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
    $this->call([
    RolesAndPermissionsSeeder::class, // 🔐 Crea permisos y roles antes de usarlos en usuarios
    UserSeeder::class,                // 👤 Usuarios que dependen de roles ya creados
    AldeaSeeder::class,              // 🏫 Base para estudiantes
    PnfSeeder::class,                // 🎓 Programas académicos antes de trayectos
    TrayectoSeeder::class,           // 🔄 Depende del PNF (trayectos dentro del programa)
    TrimestreSeeder::class,          // 🗓️ Ligado al trayecto
    MateriaSeeder::class,            // 📘 UCs que luego se relacionarán con PNF-Trayecto-Trimestre
    EstudianteSeeder::class,         // 👨‍🎓 Estudiantes que dependen de Aldea y PNF
]);
    }
}

/* 
    $this->call([
    PnfTrimTraySeeder::class,        // 🔗 Combinación de pnf-trayecto-trimestre (usa IDs previos)
    PnfUcTrimTraySeeder::class,      // 📎 Relación UCs con esa combinación
    EstudianteSeeder::class,         // 👨‍🎓 Usa Aldea, PNF, Trayecto, Trimestre, y User
    InscripcionSeeder::class,        // ✍️ Depende de estudiantes y UCs ya asignadas
]);
*/

