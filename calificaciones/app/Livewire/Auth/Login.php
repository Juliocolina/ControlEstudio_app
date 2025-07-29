<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User; // Asegúrate de que tu modelo User esté importado aquí

#[Layout('components.layouts.auth')]
class Login extends Component
{
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        // Obtener el usuario autenticado y añadir un type hint para que el IDE lo reconozca
        /** @var \App\Models\User $user */ // <-- ¡Esta es la línea clave para el IDE!
        $user = Auth::user();

        // Usar los métodos de Spatie para verificar el rol
        // El método hasRole() verifica si el usuario tiene el rol especificado
        if ($user->hasRole('administrador')) {
            $this->redirect(route('admin.dashboard'), navigate: true);
        } elseif ($user->hasRole('coordinador')) {
            $this->redirect(route('coordinador.panel'), navigate: true);
        } elseif ($user->hasRole('profesor')) {
            $this->redirect(route('profesor.home'), navigate: true);
        } elseif ($user->hasRole('estudiante')) {
            $this->redirect(route('estudiante.area'), navigate: true);
        } else {
            // Redirección por defecto si el usuario no tiene ninguno de los roles específicos
            $this->redirect(route('dashboard'), navigate: true);
        }
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}
