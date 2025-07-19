<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

//ADMINISTRACION
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Usuarios;
use App\Livewire\Coordinador\Panel;
use App\Livewire\Profesor\Home;
use App\Livewire\Estudiante\Area;


//COORDINACION
use App\Livewire\Coordinador\Profesores;
use App\Livewire\Coordinador\Trayectos;


//PROFESOR
use App\Livewire\Profesor\Estudiantes;
use App\Livewire\Profesor\Calificaciones;


//ESTUDIANTES
use App\Livewire\Estudiante\Materias;
use App\Livewire\Estudiante\Notas;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

        // Rutas por rol
    Route::get('/admin/dashboard',Dashboard::class)->name('admin.dashboard');
    Route::get('/coordinador/panel',Panel::class)->name('coordinador.panel');
    Route::get('/profesor/home',Home::class)->name('profesor.home');
    Route::get('/estudiante/area',Area::class)->name('estudiante.area');


    // Rutas de gestión de usuarios
    Route::get('/admin/usuarios', Usuarios::class)->name('admin.usuarios');
    Route::get('/admin/roles', Usuarios::class)->name('admin.roles');


        // Rutas de gestión de coordinadores
    Route::get('/coordinador/profesores', Profesores::class)->name('coordinador.profesores');
    Route::get('/coordinador/trayectos', Trayectos::class)->name('coordinador.trayectos');

            // Rutas de gestión de profesores
    Route::get('/profesor/estudiantes',Estudiantes::class)->name('profesor.estudiantes');
    Route::get('/profesor/calificaciones',Calificaciones::class)->name('profesor.calificaciones');


                // Rutas de gestión de estudiantes
    Route::get('/estudiante/materias',Materias::class)->name('estudiante.materias');
    Route::get('/estudiante/notas',Notas::class)->name('estudiante.notas');

    // Rutas de configuración
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
