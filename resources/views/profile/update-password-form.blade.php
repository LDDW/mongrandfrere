<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Mise à jour du mot de passe') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Veillez à ce que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
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
            {{ __('Sauvegarder.') }}
        </x-action-message>

        <x-datatable-button label="Sauvegarder" class="rounded-xl uppercase" color="mgf"/>
    </x-slot>
</x-form-section>
