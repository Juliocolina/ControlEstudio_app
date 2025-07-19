<x-layouts.app.sidebar :title="$title ?? null">
    <main class="w-full px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>
</x-layouts.app.sidebar>
