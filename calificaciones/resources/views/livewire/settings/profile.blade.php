<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form wire:submit.prevent="updateProfileInformation" class="my-6 w-full space-y-6">
            <!-- Name -->
            <div>
                <label for="name" class="label">{{ __('Name') }}</label>
                <input type="text" wire:model.defer="name" id="name"
                    class="input input-bordered w-full" required autofocus autocomplete="name">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="label">{{ __('Email') }}</label>
                <input type="email" wire:model.defer="email" id="email"
                    class="input input-bordered w-full" required autocomplete="email">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
                    <div class="mt-4 text-sm text-zinc-600 dark:text-zinc-300">
                        <p>
                            {{ __('Your email address is unverified.') }}
                            <button type="button" wire:click.prevent="resendVerificationNotification"
                                class="btn btn-link btn-sm text-primary no-underline">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-green-600 dark:text-green-400">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <button type="submit" class="btn btn-primary w-full">
                        {{ __('Save') }}
                    </button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>

        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>
