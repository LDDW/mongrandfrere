<x-guest-layout>
    <x-authentication-card>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h1 class="text-center font-bold text-2xl mb-10">Inscription</h1>

            <div>
                <x-input type="text" fieldName="lastname" label="Nom" name="lastname" required autofocus autocomplete="lastname" placeholder="Entrez votre nom" />
            </div>

            <div class="mt-4">
                <x-input type="text" fieldName="firstname" label="Prénom" name="firstname" required autofocus autocomplete="firstname" placeholder="Entrez votre prénom" />
            </div>

            <div class="mt-4">
                <x-input type="email" fieldName="email" label="E-mail" name="email" required autofocus autocomplete="email" placeholder="Entrez votre e-mail" />
            </div>

            <div class="mt-4">
                <x-input type="password" fieldName="password" label="Mot de passe" name="password" required autofocus autocomplete="password" placeholder="Entrez votre mot de passe" />
            </div>

            <div class="mt-4">
                <x-input type="password" fieldName="password_confirmation" label="Confirmation du mot de passe" name="password_confirmation" required autofocus autocomplete="password_confirmation" placeholder="Confirmez votre mot de passe" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">

                                {!! __('J\'accepte les :terms_of_service et la :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Conditions d\'utilisation').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Politique de confidentialité').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <x-datatable-button label="Inscription" class="w-full mt-8 mb-4 rounded-xl" color="mgf"/>
            <p class="text-sm text-center">Vous avez un compte ? <a href="{{ route('login') }}" class="underline text-[#57C5B6]">Connexion</a></p>
        </form>
    </x-authentication-card>
</x-guest-layout>
