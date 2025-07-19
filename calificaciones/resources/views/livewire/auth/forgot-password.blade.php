<div class="flex flex-col gap-6">
    <x-auth-header
        :title="__('Forgot password')"
        :description="__('Enter your email to receive a password reset link')"
    />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit.prevent="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <div>
            <label for="email" class="label">{{ __('Email Address') }}</label>
            <input type="email" wire:model.defer="email" id="email" placeholder="email@example.com"
                class="input input-bordered w-full" required autofocus>
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-primary w-full">
                {{ __('Email password reset link') }}
            </button>
        </div>
    </form>

    <div class="text-center text-sm text-zinc-400">
        {{ __('Or, return to') }}
        <a href="{{ route('login') }}" class="link link-hover text-primary">
            {{ __('log in') }}
        </a>
    </div>
</div>
