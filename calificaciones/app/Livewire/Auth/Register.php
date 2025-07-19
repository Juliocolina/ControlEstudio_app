<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
   public function register(): void
{
    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
    ]);

    $validated['password'] = Hash::make($validated['password']);

    event(new Registered($user = User::create($validated)));

    Auth::login($user);

    $rol = $user->role->name;

    switch ($rol) {
        case 'administrador':
            $this->redirect(route('admin.dashboard'), navigate: true);
            break;
        case 'coordinador':
            $this->redirect(route('coordinador.panel'), navigate: true);
            break;
        case 'profesor':
            $this->redirect(route('profesor.home'), navigate: true);
            break;
        case 'estudiante':
            $this->redirect(route('estudiante.area'), navigate: true);
            break;
        default:
            $this->redirect(route('dashboard'), navigate: true);
            break;
    }
}

}
