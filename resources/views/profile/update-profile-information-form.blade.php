<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
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
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
