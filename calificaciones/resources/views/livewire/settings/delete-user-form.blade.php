<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <h2 class="text-lg font-semibold">{{ __('Delete account') }}</h2>
        <p class="text-sm text-zinc-500 dark:text-zinc-400">
            {{ __('Delete your account and all of its resources') }}
        </p>
    </div>

    <button
        type="button"
        class="btn btn-error"
        x-data
        @click="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('Delete account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form wire:submit.prevent="deleteUser" class="space-y-6 p-6">
            <div>
                <h3 class="text-lg font-semibold">
                    {{ __('Are you sure you want to delete your account?') }}
                </h3>
                <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-300">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>
            </div>

            <div>
                <label for="password" class="label">{{ __('Password') }}</label>
                <input
                    type="password"
                    id="password"
                    wire:model.defer="password"
                    class="input input-bordered w-full"
                >
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" class="btn" @click="$dispatch('close')">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="btn btn-error">
                    {{ __('Delete account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
