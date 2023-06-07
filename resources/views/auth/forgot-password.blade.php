<x-guest-layout>
    <x-authentication-card>

        <h1 class="text-center font-bold text-2xl mb-10">Mot de passe oublié</h1>

        <div class="mb-8 text-sm text-gray-600">
            {{ __('Vous avez oublié votre mot de passe ? Pas de problème. Indiquez-nous votre adresse électronique et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra d\'en choisir un nouveau.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block"> 
                <x-input type="email" fieldName="email" name="email" label="Email" required autofocus autocomplete="username" />
            </div>

            <x-datatable-button label="Lien de réinitialisation du mot de passe par courriel" class="w-full mt-8 mb-4 rounded-xl" color="mgf"/>
        </form>
    </x-authentication-card>
</x-guest-layout>
