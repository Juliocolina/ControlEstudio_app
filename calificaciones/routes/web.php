<?php

// Importaciones de Livewire Components
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

//ADMINISTRACION
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Usuarios;
// use App\Livewire\Admin\Roles; // Si tuvieras un componente específico para roles, lo importarías aquí

//COORDINACION
use App\Livewire\Coordinador\Panel;
use App\Livewire\Coordinador\Profesores;
use App\Livewire\Coordinador\Trayectos;

//PROFESOR
use App\Livewire\Profesor\Home;
use App\Livewire\Profesor\Estudiantes;
use App\Livewire\Profesor\Calificaciones;

//ESTUDIANTES
use App\Livewire\Estudiante\Area;
use App\Livewire\Estudiante\Materias;
use App\Livewire\Estudiante\Notas;


// Ruta principal o de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Ruta de dashboard genérica (puede ser un fallback o para usuarios sin rol específico)
// Mantén 'verified' si lo necesitas, pero recuerda que eliminamos email_verified_at de la migración.
// Si no usas verificación de email, puedes quitar 'verified'.
Route::view('dashboard', 'dashboard')
    ->middleware(['auth']) // 'verified' se quita si no se usa verificación de email
    ->name('dashboard');

// Grupo de rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // --- RUTAS PROTEGIDAS POR ROLES CON SPATIE ---

    // Rutas para el rol 'administrador'
    Route::middleware('role:administrador')->group(function () {
        Route::get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
        Route::get('/admin/usuarios', Usuarios::class)->name('admin.usuarios');
    });

    // Rutas para el rol 'coordinador'
    Route::middleware('role:coordinador')->group(function () {
        Route::get('/coordinador/panel', Panel::class)->name('coordinador.panel');
        Route::get('/coordinador/profesores', Profesores::class)->name('coordinador.profesores');
        Route::get('/coordinador/trayectos', Trayectos::class)->name('coordinador.trayectos');
    });

    // Rutas para el rol 'profesor'
    Route::middleware('role:profesor')->group(function () {
        Route::get('/profesor/home', Home::class)->name('profesor.home');
        Route::get('/profesor/estudiantes', Estudiantes::class)->name('profesor.estudiantes');
        Route::get('/profesor/calificaciones', Calificaciones::class)->name('profesor.calificaciones');
    });

    // Rutas para el rol 'estudiante'
    Route::middleware('role:estudiante')->group(function () {
        Route::get('/estudiante/area', Area::class)->name('estudiante.area');
        Route::get('/estudiante/materias', Materias::class)->name('estudiante.materias');
        Route::get('/estudiante/notas', Notas::class)->name('estudiante.notas');
    });

    // Rutas de configuración (pueden ser accesibles por cualquier usuario autenticado)
    // No necesitan middleware de rol si todos los usuarios pueden acceder a su perfil/configuración
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// Incluye las rutas de autenticación de Laravel si usas Breeze/Jetstream
require __DIR__.'/auth.php';
