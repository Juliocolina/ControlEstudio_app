<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white text-zinc-900">
    <header class="w-full border-b border-zinc-200 bg-zinc-50 px-4 py-3 flex items-center justify-between">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
            <x-app-logo />
            <span class="font-semibold text-lg">{{ config('app.name') }}</span>
        </a>

        <nav class="space-x-4 hidden lg:flex">
            <a href="{{ route('dashboard') }}" class="@if(request()->routeIs('dashboard')) font-bold @endif hover:underline">
                {{ __('Dashboard') }}
            </a>
            <a href="https://laravel.com/docs/starter-kits#livewire" target="_blank" class="hover:underline text-sm text-zinc-600">
                {{ __('Documentation') }}
            </a>
            <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" class="hover:underline text-sm text-zinc-600">
                {{ __('Repository') }}
            </a>
        </nav>

        <!-- User dropdown -->
        <div class="relative">
            <div class="flex items-center space-x-2">
                <span class="bg-neutral-200 text-black w-8 h-8 flex items-center justify-center rounded-lg text-sm font-bold">
                    {{ auth()->user()->initials() }}
                </span>
                <span class="hidden sm:block">{{ auth()->user()->name }}</span>
            </div>
        </div>
    </header>

    <main class="w-full px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    @stack('scripts')
</body>
</html>
