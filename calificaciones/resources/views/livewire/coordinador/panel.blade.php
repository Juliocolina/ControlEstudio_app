{{-- resources/views/coordinador/panel.blade.php --}}

<x-layouts.app :title="'Panel de Coordinación'">
    <div class="p-6 space-y-6">
        {{-- Ya no necesitamos el bloque @php para obtener el rol, la vista es específica del coordinador --}}
        <h1 class="text-2xl font-bold">Panel de Coordinación</h1>
        <p>👤 Usuario: <strong>{{ auth()->user()->name }}</strong></p>
        {{-- El rol se muestra directamente como "Coordinador" ya que esta vista es solo para ellos --}}
        <p>🔐 Rol: <span class="text-teal-600 font-semibold">Coordinador</span></p>

        <hr class="my-4">

        <div class="space-y-2">
            <h2 class="text-lg font-semibold">Accesos disponibles</h2>
            <ul class="list-disc pl-5">
                <li><a href="{{ route('coordinador.profesores') }}" class="text-teal-600 hover:underline">Ver profesores</a></li>
                <li><a href="{{ route('coordinador.trayectos') }}" class="text-teal-600 hover:underline">Gestionar trayectos</a></li>
            </ul>
        </div>

        {{-- Aquí podrás agregar funcionalidades dinámicas del coordinador más adelante --}}
    </div>
</x-layouts.app>
