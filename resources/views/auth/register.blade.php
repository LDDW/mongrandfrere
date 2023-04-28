<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-input type="text" fieldName="lastname" label="Nom" name="lastname" required autofocus autocomplete="lastname" />
            </div>

            <div class="mt-4">
                <x-input type="text" fieldName="firstname" label="Prénom" name="firstname" required autofocus autocomplete="firstname" />
            </div>

            <div class="mt-4">
                <x-input type="email" fieldName="email" label="E-mail" name="email" required autofocus autocomplete="email" />
            </div>

            <div class="mt-4">
                <x-input type="password" fieldName="password" label="Mot de passe" name="password" required autofocus autocomplete="password" />
            </div>

            <div class="mt-4">
                <x-input type="password" fieldName="password_confirmation" label="Confirmation du mot de passe" name="password_confirmation" required autofocus autocomplete="password_confirmation" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">    Vous avez un compte ?</a>
                <x-datatable-button label="Inscription" class="ml-4"/>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
