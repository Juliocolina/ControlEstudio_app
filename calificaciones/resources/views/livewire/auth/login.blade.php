<div class="flex flex-col gap-6">
    <x-auth-header
        :title="__('Inicia sesión en tu cuenta
')"
        :description="__('Ingrese su correo electrónico y contraseña para iniciar sesión')"
    />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit.prevent="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <div>
            <label for="email" class="label">{{ __('Correo electronico') }}</label>
            <input type="email" wire:model.defer="email" id="email" placeholder="email@example.com"
                class="input input-bordered w-full" required autofocus autocomplete="email">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div class="relative">
            <label for="password" class="label">{{ __('Contraseña') }}</label>
            <input type="password" wire:model.defer="password" id="password" placeholder="{{ __('contraseña') }}"
                class="input input-bordered w-full" required autocomplete="current-password">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            @if (Route::has('password.request'))
                <a href="{{ route('password.elegir-metodo') }}"
                   class="absolute end-0 top-0 text-sm link link-hover text-primary">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>

        <!-- Remember Me -->
        <label class="label cursor-pointer justify-start gap-2">
            <input type="checkbox" wire:model.defer="remember" class="checkbox checkbox-sm">
            <span class="label-text">{{ __('Acuerdate de mi') }}</span>
        </label>

        <div>
            <button type="submit" class="btn btn-primary w-full">
                {{ __('Entrar') }}
            </button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="text-center text-sm text-zinc-600 dark:text-zinc-400 mt-4">
            {{ __('¿No tienes una cuenta?') }}
            <a href="{{ route('register') }}" class="link link-hover text-primary">{{ __('Regístrate') }}</a>
        </div>
    @endif
</div>
