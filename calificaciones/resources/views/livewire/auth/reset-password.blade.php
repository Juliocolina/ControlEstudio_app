<div class="flex flex-col gap-6">
    <x-auth-header
        :title="__('Reset password')"
        :description="__('Please enter your new password below')"
    />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit.prevent="resetPassword" class="flex flex-col gap-6">
        <!-- Email Address -->
        <div>
            <label for="email" class="label">{{ __('Email') }}</label>
            <input type="email" wire:model.defer="email" id="email"
                class="input input-bordered w-full" autocomplete="email" required>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="label">{{ __('Password') }}</label>
            <input type="password" wire:model.defer="password" id="password"
                class="input input-bordered w-full" autocomplete="new-password"
                placeholder="{{ __('Password') }}" required>
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="label">{{ __('Confirm password') }}</label>
            <input type="password" wire:model.defer="password_confirmation" id="password_confirmation"
                class="input input-bordered w-full" autocomplete="new-password"
                placeholder="{{ __('Confirm password') }}" required>
        </div>

        <div>
            <button type="submit" class="btn btn-primary w-full">
                {{ __('Reset password') }}
            </button>
        </div>
    </form>
</div>
