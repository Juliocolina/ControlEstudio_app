<div class="p-6 space-y-6">
    @php
        $usuario = auth()->user();
        $rol = $usuario->role->name;
    @endphp

    <h1 class="text-2xl font-bold">Panel de Coordinación</h1>
    <p>👤 Usuario: <strong>{{ $usuario->name }}</strong></p>
    <p>🔐 Rol: <span class="text-teal-600 font-semibold">{{ ucfirst($rol) }}</span></p>

    <hr class="my-4">

    <div class="space-y-2">
        <h2 class="text-lg font-semibold">Accesos disponibles</h2>
        <ul class="list-disc pl-5">
            <li><a href="{{ route('coordinador.profesores') }}" class="text-teal-600 hover:underline">Ver reportes académicos</a></li>
            <li><a href="{{ route('coordinador.trayectos') }}" class="text-teal-600 hover:underline">Gestionar calendario</a></li>
        </ul>
    </div>

    {{-- Aquí podrás agregar funcionalidades dinámicas del coordinador más adelante --}}
</div>
