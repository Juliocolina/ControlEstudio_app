<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout
        :heading="__('Update password')"
        :subheading="__('Ensure your account is using a long, random password to stay secure')"
    >
        <form wire:submit.prevent="updatePassword" class="mt-6 space-y-6">
            <!-- Current Password -->
            <div>
                <label for="current_password" class="label">{{ __('Current password') }}</label>
                <input type="password" wire:model.defer="current_password" id="current_password"
                    class="input input-bordered w-full" required autocomplete="current-password">
                @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- New Password -->
            <div>
                <label for="password" class="label">{{ __('New password') }}</label>
                <input type="password" wire:model.defer="password" id="password"
                    class="input input-bordered w-full" required autocomplete="new-password">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="label">{{ __('Confirm Password') }}</label>
                <input type="password" wire:model.defer="password_confirmation" id="password_confirmation"
                    class="input input-bordered w-full" required autocomplete="new-password">
            </div>

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <button type="submit" class="btn btn-primary w-full">
                        {{ __('Save') }}
                    </button>
                </div>

                <x-action-message class="me-3" on="password-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>
    </x-settings.layout>
</section>
