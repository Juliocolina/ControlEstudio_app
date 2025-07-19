<x-layouts.auth.simple>
    <x-auth-header 
        :title="__('Método de recuperación de contraseña')" 
        :description="__('Elija el método para recuperar su contraseña')" 
    />

    <h2 class="text-xl font-bold text-center">{{ __('¿Cómo deseas recuperar tu contraseña?') }}</h2>
   
    <div class="flex flex-col gap-4 mt-6">
        <a href="{{ route('password.request') }}" class="btn btn-primary w-full">
            🔐 {{ __('Recuperar por correo electrónico') }}
        </a>

        <a href="{{ route('password.security-questions') }}" class="btn btn-outline w-full">
            🧠 {{ __('Responde tus preguntas de seguridad') }}
        </a>
    </div>

    <div class="text-center mt-6">
        <a href="{{ route('login') }}" class="text-sm text-primary hover:underline">
            ← {{ __('Volver al inicio de sesión') }}
        </a>
    </div>
</x-layouts.app.simple>
