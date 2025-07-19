<div class="flex flex-col gap-6">
    <x-auth-header
        :title="__('Confirm password')"
        :description="__('This is a secure area of the application. Please confirm your password before continuing.')"
    />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit.prevent="confirmPassword" class="flex flex-col gap-6">
        <!-- Password -->
        <div>
            <label for="password" class="label">{{ __('Password') }}</label>
            <input
                type="password"
                id="password"
                wire:model="password"
                autocomplete="new-password"
                placeholder="{{ __('Password') }}"
                required
                class="input input-bordered w-full"
            />
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-full">
            {{ __('Confirm') }}
        </button>
    </form>
</div>
