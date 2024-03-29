<x-guest-layout>
    <x-authentication-card>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Avant de continuer, pourriez-vous vérifier votre adresse électronique en cliquant sur le lien que nous venons de vous envoyer ? Si vous n\'avez pas reçu l\'e-mail, nous vous en enverrons un autre avec plaisir.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse électronique que vous avez indiquée dans les paramètres de votre profil.') }}
            </div>
        @endif

        <div class="mt-4 text-center">
            <form method="POST" class="mb-4" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-datatable-button type="submit" label="Renvoyer l'e-mail de vérification" class="w-full rounded-xl" color="mgf"/>
                </div>
            </form>

            <div>
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    {{ __('Modifier le profil') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                        {{ __('Se déconnecter') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
