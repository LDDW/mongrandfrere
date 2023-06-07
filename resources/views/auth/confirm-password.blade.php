<x-guest-layout>
    <x-authentication-card>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Il s\'agit d\'une zone sécurisée de l\'application. Veuillez confirmer votre mot de passe avant de continuer.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-input type="password" fieldName="password" name="password" label="Mot de passe" required autofocus autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-datatable-button label="Confirmer" class="w-full mt-8 mb-4 rounded-xl" color="mgf"/>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
