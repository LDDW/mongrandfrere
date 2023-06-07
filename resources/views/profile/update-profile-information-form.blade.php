<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informations sur le profil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mettez à jour les informations de profil et l\'adresse e-mail de votre compte.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Lastname -->
        <div class="col-span-6 sm:col-span-4">
            <x-input type="text" fieldName="lastname" wire:model="state.lastname" label="Nom" required autofocus autocomplete="lastname" />
        </div>

        <!-- Firstname -->
        <div class="col-span-6 sm:col-span-4">
            <x-input type="text" fieldName="firstname" wire:model="state.firstname" label="Prénom" required autofocus autocomplete="firstname" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-input type="email" fieldName="email" wire:model="state.email" label="Email" required autofocus autocomplete="username" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Votre adresse électronique n\'est pas vérifiée.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('Un nouveau lien de vérification a été envoyé à votre adresse électronique.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Sauvegarder.') }}
        </x-action-message>

        <x-datatable-button wire:loading.attr="disabled" wire:target="photo" label="Sauvegarder" class="rounded-xl uppercase" color="mgf"/>
    </x-slot>
</x-form-section>
