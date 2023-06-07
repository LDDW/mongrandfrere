<x-guest-layout>
    <x-authentication-card>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h1 class="text-center font-bold text-2xl mb-10">Connexion</h1>

            <div class="mb-6">
                <x-input type="email" fieldName="email" name="email" label="Email" required autofocus autocomplete="username" placeholder="Votre@email.com" />
            </div>

            <div class="mt-4">
                <x-input type="password" fieldName="password" name="password" label="Mot de passe" required autocomplete="current-password" placeholder="Entrez votre mot de passe"/>
            </div>

            <div class="mt-4 flex items-center justify-between">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-[#57C5B6] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                @endif
            </div>


            <x-datatable-button label="Connexion" class="w-full mt-8 mb-4 rounded-xl" color="mgf"/>
            <p class="text-sm text-center">Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="underline text-[#57C5B6]">S'inscrire</a></p>

        </form>
    </x-authentication-card>
</x-guest-layout>
