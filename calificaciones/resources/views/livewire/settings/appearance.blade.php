<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout
        :heading="__('Appearance')"
        :subheading="__('Update the appearance settings for your account')"
    >
        <div class="my-6 flex flex-col gap-4">
            <label class="font-medium">{{ __('Appearance mode') }}</label>

            <div class="join w-full">
                <input type="radio" name="appearance" wire:model="appearance"
                    value="light" class="btn join-item"
                    :class="{ 'btn-active': appearance === 'light' }"
                > {{ __('Light') }}

                <input type="radio" name="appearance" wire:model="appearance"
                    value="dark" class="btn join-item"
                    :class="{ 'btn-active': appearance === 'dark' }"
                > {{ __('Dark') }}

                <input type="radio" name="appearance" wire:model="appearance"
                    value="system" class="btn join-item"
                    :class="{ 'btn-active': appearance === 'system' }"
                > {{ __('System') }}
            </div>
        </div>
    </x-settings.layout>
</section>
