@php
    $usuario = auth()->user();
    $rol = $usuario->role->name;
@endphp

<x-layouts.app :title="'Panel de ' . ucfirst($rol)">
    <div class="p-6 space-y-6">
        <h2 class="text-2xl font-bold">Bienvenido, {{ $usuario->name }}</h2>
        <p class="text-lg">Estás conectado como: <span class="font-semibold text-blue-600">{{ ucfirst($rol) }}</span></p>

        @if($rol === 'administrador')
            <div class="space-y-2">
                <p>⚙️ Funciones disponibles:</p>
                <ul class="list-disc pl-5">
                    <li><a href="{{ route('admin.usuarios') }}" class="text-indigo-600 hover:underline">Gestionar usuarios</a></li>
                    <li><a href="{{ route('admin.roles') }}" class="text-indigo-600 hover:underline">Gestionar roles</a></li>
                </ul>
            </div>

        @elseif($rol === 'coordinador')
            <div class="space-y-2">
                <p>📋 Accesos rápidos:</p>
                <ul class="list-disc pl-5">
                    <li><a href="{{ route('coordinador.profesores') }}" class="text-teal-600 hover:underline">Ver profesores</a></li>
                    <li><a href="{{ route('coordinador.trayectos') }}" class="text-teal-600 hover:underline">Gestionar trayectos</a></li>
                </ul>
            </div>

        @elseif($rol === 'profesor')
            <div class="space-y-2">
                <p>🧑‍🏫 Herramientas docentes:</p>
                <ul class="list-disc pl-5">
                    <li><a href="{{ route('profesor.estudiantes') }}" class="text-purple-600 hover:underline">ver estudiantes</a></li>
                    <li><a href="{{ route('profesor.calificaciones') }}" class="text-purple-600 hover:underline">Subir calificaciones</a></li>
                </ul>
            </div>

        @elseif($rol === 'estudiante')
            <div class="space-y-2">
                <p>📚 Área de estudiante:</p>
                <ul class="list-disc pl-5">
                    <li><a href="{{ route('estudiante.materias') }}" class="text-green-600 hover:underline">Ver materias inscritas</a></li>
                    <li><a href="{{ route('estudiante.calificaciones') }}" class="text-green-600 hover:underline">Consultar calificaciones</a></li>
                </ul>
            </div>

        @else
            <p class="text-red-500">⚠️ Rol no reconocido. Contacta al administrador.</p>
        @endif
    </div>
</x-layouts.app>
