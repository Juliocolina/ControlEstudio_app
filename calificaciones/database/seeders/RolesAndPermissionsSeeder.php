<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reiniciar los roles y permisos cacheados
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

       // Permisos generales de paneles
$viewAdminDashboard = Permission::firstOrCreate(['name' => 'view admin dashboard']);
$viewCoordinadorPanel = Permission::firstOrCreate(['name' => 'view coordinador panel']);
$viewProfesorHome = Permission::firstOrCreate(['name' => 'view profesor home']);
$viewEstudianteArea = Permission::firstOrCreate(['name' => 'view estudiante area']);

// Gestión de usuarios
$administrarUsers = Permission::firstOrCreate(['name' => 'manage users']);
$asignarRoles = Permission::firstOrCreate(['name' => 'assign roles']);
$editRoles = Permission::firstOrCreate(['name' => 'edit roles']);
$deleteRoles = Permission::firstOrCreate(['name' => 'delete roles']);

// Gestión académica
$createPNF = Permission::firstOrCreate(['name' => 'create pnf']);
$editPNF = Permission::firstOrCreate(['name' => 'edit pnf']);
$createTrayecto = Permission::firstOrCreate(['name' => 'create trayecto']);
$createTrimestre = Permission::firstOrCreate(['name' => 'create trimestre']);
$asignarUCTOPNF = Permission::firstOrCreate(['name' => 'assign uc to pnf']);
$defineOfertaAcademica = Permission::firstOrCreate(['name' => 'create pnf_tray_trim']);

// Gestión de inscripciones
$viewInscripciones = Permission::firstOrCreate(['name' => 'view inscripciones']);
$gestionarInscripciones = Permission::firstOrCreate(['name' => 'manage inscripciones']);

// Gestión docente
$asignarCargaDocente = Permission::firstOrCreate(['name' => 'assign carga docente']);
$editCargaDocente = Permission::firstOrCreate(['name' => 'edit carga docente']);

// Gestión de notas
$viewNotas = Permission::firstOrCreate(['name' => 'view all notas']);
$editNotas = Permission::firstOrCreate(['name' => 'edit notas']);
$deleteNotas = Permission::firstOrCreate(['name' => 'delete notas']);

// Gestión de aldeas
$createAldea = Permission::firstOrCreate(['name' => 'create aldea']);
$asignarCoordinadorAldea = Permission::firstOrCreate(['name' => 'assign coordinador to aldea']);

// Historial académico
$viewHistorialAcademico = Permission::firstOrCreate(['name' => 'view historial académico']);
$exportHistorial = Permission::firstOrCreate(['name' => 'export historial académico']);

        // Crear roles (si no existen)
        $adminRole = Role::firstOrCreate(['name' => 'administrador']);
        $coordinadorRole = Role::firstOrCreate(['name' => 'coordinador']);
        $profesorRole = Role::firstOrCreate(['name' => 'profesor']);
        $estudianteRole = Role::firstOrCreate(['name' => 'estudiante']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo([
    $viewAdminDashboard,
    $viewCoordinadorPanel,
    $viewProfesorHome,
    $viewEstudianteArea,
    $administrarUsers,
    $asignarRoles,
    $editRoles,
    $deleteRoles,
    $createPNF,
    $editPNF,
    $createTrayecto,
    $createTrimestre,
    $asignarUCTOPNF,
    $defineOfertaAcademica,
    $viewInscripciones,
    $gestionarInscripciones,
    $asignarCargaDocente,
    $editCargaDocente,
    $viewNotas,
    $editNotas,
    $deleteNotas,
    $createAldea,
    $asignarCoordinadorAldea,
    $viewHistorialAcademico,
    $exportHistorial,
]);


        $coordinadorRole->givePermissionTo([
            $viewCoordinadorPanel,
            $viewProfesorHome,
            $viewEstudianteArea
        ]);

        $profesorRole->givePermissionTo([
            $viewProfesorHome,
            $viewEstudianteArea
        ]);

        $estudianteRole->givePermissionTo($viewEstudianteArea);

        // Opcional: Asignar permisos directamente a usuarios si es necesario
        // $user = \App\Models\User::find(1);
        // $user->givePermissionTo('some permission');
    }
}
