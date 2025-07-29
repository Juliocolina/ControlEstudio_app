

<div class="flex flex-col gap-6">
    <x-auth-header
        :title="__('Create an account')"
        :description="__('Ingrese sus datos a continuación para crear su cuenta

')"
    />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit.prevent="register" class="flex flex-col gap-6">
        <!-- Name -->
        <div>
            <label for="name" class="label">{{ __('Nombre') }}</label>
            <input type="text" wire:model.defer="name" id="name" placeholder="{{ __('nombre') }}"
                class="input input-bordered w-full" required autofocus autocomplete="name">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="label">{{ __('Dirección de correo electrónico') }}</label>
            <input type="email" wire:model.defer="email" id="email" placeholder="email@example.com"
                class="input input-bordered w-full" required autocomplete="email">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="label">{{ __('Contraseña') }}</label>
            <input type="password" wire:model.defer="password" id="password" placeholder="{{ __('contraseña') }}"
                class="input input-bordered w-full" required autocomplete="Nueva-contraseña">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="label">{{ __('Confirmar contraseña') }}</label>
            <input type="password" wire:model.defer="password_confirmation" id="password_confirmation"
                placeholder="{{ __('confirmar contraseña') }}" class="input input-bordered w-full" required
                autocomplete="new-password">
        </div>

        <!-- Submit -->
        <div>
            <button type="submit" class="btn btn-primary w-full">
                {{ __('Crear cuenta') }}
            </button>
        </div>
    </form>

    <div class="text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('¿Ya tienes una cuenta?') }}
        <a href="{{ route('login') }}" class="link link-hover text-primary">{{ __('Iniciar sesion') }}</a>
    </div>
</div>
