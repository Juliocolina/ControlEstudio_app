<x-layouts.auth.simple>
    <h2 class="text-xl font-bold text-center mb-6">🧠 Recuperación por preguntas de seguridad</h2>

    @if (empty($questions))
        <form wire:submit.prevent="loadQuestions" class="space-y-4">
            <label>Email asociado a tu cuenta</label>
            <input type="email" wire:model.defer="email" class="input w-full" placeholder="ejemplo@correo.com">

            <button type="submit" class="btn btn-primary w-full">
                Buscar preguntas
            </button>

            @error('email') <p class="text-red-600">{{ $message }}</p> @enderror
        </form>
    @else
        <form wire:submit.prevent="verifyAnswers" class="space-y-6">
            @foreach ($questions as $index => $item)
                <div>
                    <label class="block font-semibold">{{ $item['question'] }}</label>
                    <input type="text" wire:model.defer="answers.{{ $index }}" class="input w-full">
                </div>
            @endforeach

            <button type="submit" class="btn btn-success w-full">
                Validar respuestas
            </button>

            @error('answers') <p class="text-red-600 mt-2 text-center">{{ $message }}</p> @enderror
        </form>
    @endif
</x-layouts.auth.simple>
