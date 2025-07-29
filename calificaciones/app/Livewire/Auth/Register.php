<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Role; // Importar el modelo Role de Spatie

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    // Añadir la cédula
    #[Validate('required|string|max:255|unique:'.User::class.',cedula')]
    public string $cedula = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        // Validar los datos de entrada, incluyendo la cédula
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'cedula' => ['required', 'string', 'max:255', 'unique:'.User::class.',cedula'], // Validar cédula
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Hashear la contraseña
        $validated['password'] = Hash::make($validated['password']);

        // Crear el usuario
        $user = User::create($validated);

        // Asignar un rol por defecto al usuario recién registrado
        // Por ejemplo, asignar el rol 'estudiante' por defecto
        $defaultRole = Role::where('name', 'estudiante')->first();
        if ($defaultRole) {
            $user->assignRole($defaultRole);
        } else {
            // Manejar el caso si el rol 'estudiante' no existe (ej. loggear un error)
            // throw new \Exception("El rol 'estudiante' no existe. Asegúrate de ejecutar los seeders.");
            error_log("El rol 'estudiante' no existe. Asegúrate de ejecutar los seeders.");
        }

        // Disparar el evento de usuario registrado
        event(new Registered($user));

        // Iniciar sesión con el usuario
        Auth::login($user);

        // Redireccionar según el rol (usando los métodos de Spatie)
        if ($user->hasRole('administrador')) {
            $this->redirect(route('admin.dashboard'), navigate: true);
        } elseif ($user->hasRole('coordinador')) {
            $this->redirect(route('coordinador.panel'), navigate: true);
        } elseif ($user->hasRole('profesor')) {
            $this->redirect(route('profesor.home'), navigate: true);
        } elseif ($user->hasRole('estudiante')) {
            $this->redirect(route('estudiante.area'), navigate: true);
        } else {
            // Redirección por defecto si el usuario no tiene un rol específico o si el rol no coincide
            $this->redirect(route('dashboard'), navigate: true);
        }
    }
}
