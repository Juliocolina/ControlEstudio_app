{{-- resources/views/admin/dashboard.blade.php --}}

<x-layouts.app :title="'Panel de Administrador'">
    <div class="p-6 space-y-6">
        <h2 class="text-2xl font-bold">Bienvenido, {{ auth()->user()->name }}</h2>
        <p class="text-lg">Estás conectado como: <span class="font-semibold text-blue-600">Administrador</span></p>

        <div class="space-y-2">
            <p>⚙️ Funciones disponibles:</p>
            <ul class="list-disc pl-5">
                <li><a href="{{ route('admin.usuarios') }}" class="text-indigo-600 hover:underline">Gestionar usuarios</a></li>
                {{-- Aquí puedes añadir más enlaces o contenido específico del administrador --}}
            </ul>
        </div>
    </div>
</x-layouts.app>
