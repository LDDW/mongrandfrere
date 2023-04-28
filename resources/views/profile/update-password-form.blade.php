<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-input type="password" fieldName="current_password" wire:model.defer="state.current_password" label="Mot de passe actuel" required autofocus autocomplete="current-password" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input type="password" fieldName="password" wire:model.defer="state.password" label="Nouveau mot de passe" required autofocus autocomplete="new-password" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-input type="password" fieldName="password_confirmation" wire:model.defer="state.password_confirmation" label="Confimation du nouveau mot de passe" required autofocus autocomplete="new-password" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
