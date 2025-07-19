@props([
    'title',
    'description',
])

<div class="flex w-full flex-col text-center">
    <h1 class="text-3xl font-bold tracking-tight">{{ $title }}</h1>
    <p class="mt-1 text-zinc-600 dark:text-zinc-400">{{ $description }}</p>
</div>
