<div class="mt-4 flex flex-col gap-6">
    <p class="text-center">
        {{ __('Please verify your email address by clicking on the link we just emailed to you.') }}
    </p>

    @if (session('status') === 'verification-link-sent')
        <p class="text-center font-medium text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </p>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <button wire:click="sendVerification" type="button" class="btn btn-primary w-full">
            {{ __('Resend verification email') }}
        </button>

        <button wire:click="logout" type="button" class="text-sm link link-hover text-primary">
            {{ __('Log out') }}
        </button>
    </div>
</div>
