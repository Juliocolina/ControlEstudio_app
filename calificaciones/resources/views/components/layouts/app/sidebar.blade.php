<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white text-zinc-900 flex">
    <!-- Sidebar -->
    <aside class="hidden lg:flex w-64 flex-col bg-zinc-50 border-r border-zinc-200 p-4 space-y-6">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
            <x-app-logo class="w-6 h-6" />
            <span class="font-semibold text-lg">{{ config('app.name') }}</span>
        </a>

        <nav class="flex flex-col space-y-2">
            <a href="{{ route('dashboard') }}"
               class="px-3 py-2 rounded-md hover:bg-zinc-100 @if(request()->routeIs('dashboard')) font-bold bg-zinc-100 @endif">
                {{ __('Dashboard') }}
            </a>
            <a href="https://laravel.com/docs/starter-kits#livewire" target="_blank" class="text-sm hover:underline text-zinc-600">
                {{ __('Usuarios') }}
            </a>
            <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" class="text-sm hover:underline text-zinc-600">
                {{ __('Aldeas') }}
            </a>
           
        </nav>

        <div class="mt-auto flex items-center space-x-2">
            <div class="bg-neutral-200 text-black w-8 h-8 flex items-center justify-center rounded-lg font-bold text-sm">
                {{ auth()->user()->initials() }}
            </div>
            <div class="flex-1">
                <p class="truncate font-semibold">{{ auth()->user()->name }}</p>
                <p class="truncate text-xs">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-left hover:underline text-red-600">
                {{ __('Log Out') }}
            </button>
        </form>
    </aside>

    <!-- Mobile header -->
    <header class="w-full lg:hidden flex items-center justify-between bg-zinc-50 border-b border-zinc-200 px-4 py-3">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
            <x-app-logo class="w-6 h-6" />
            <span class="font-semibold text-lg">{{ config('app.name') }}</span>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm text-red-600 hover:underline">
                {{ __('Log Out') }}
            </button>
        </form>
    </header>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        {{ $slot }}
    </main>
</body>
</html>
