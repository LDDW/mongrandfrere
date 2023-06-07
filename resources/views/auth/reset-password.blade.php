<x-guest-layout>
    <x-authentication-card>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-input type="email" fieldName="email" name="email" label="Email" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-input type="password" fieldName="password" name="password" label="Mot de passe" required autofocus autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-input type="password" fieldName="password_confirmation" name="password_confirmation" label="Confirmation du nouveau mot de passe" required autofocus autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Réinitialiser le mot de passe') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
