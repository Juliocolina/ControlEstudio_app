<div class="flex items-start max-md:flex-col">
    <!-- Navegación lateral -->
    <div class="me-10 w-full pb-4 md:w-[220px]">
        <ul class="menu rounded-box bg-base-100 shadow md:sticky md:top-6">
            <li>
                <a href="{{ route('settings.profile') }}" class="@if(request()->routeIs('settings.profile')) active @endif">
                    {{ __('Profile') }}
                </a>
            </li>
            <li>
                <a href="{{ route('settings.password') }}" class="@if(request()->routeIs('settings.password')) active @endif">
                    {{ __('Password') }}
                </a>
            </li>
            <li>
                <a href="{{ route('settings.appearance') }}" class="@if(request()->routeIs('settings.appearance')) active @endif">
                    {{ __('Appearance') }}
                </a>
            </li>
        </ul>
    </div>

    <!-- Línea divisora para móviles -->
    <hr class="md:hidden my-4 border-zinc-200 dark:border-zinc-700" />

    <!-- Contenido principal -->
    <div class="flex-1 self-stretch max-md:pt-6">
        @if (!empty($heading))
            <h2 class="text-xl font-semibold mb-1">{{ $heading }}</h2>
        @endif

        @if (!empty($subheading))
            <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-4">{{ $subheading }}</p>
        @endif

        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
