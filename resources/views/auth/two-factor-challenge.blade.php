<x-guest-layout>
    <x-authentication-card>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600" x-show="! recovery">
                {{ __('Veuillez confirmer l\'accès à votre compte en saisissant le code d\'authentification fourni par votre application d\'authentification.') }}
            </div>

            <div class="mb-4 text-sm text-gray-600" x-cloak x-show="recovery">
                {{ __('Veuillez confirmer l\'accès à votre compte en saisissant l\'un de vos codes de récupération d\'urgence.') }}
            </div>

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-input type="text" fieldName="code" name="code" label="Code" required autofocus autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-cloak x-show="recovery">
                    <x-input type="text" fieldName="recovery_code" name="recovery_code" label="Recovery Code" required autofocus autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer"
                                    x-cloak
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Utiliser un code d\'authentification') }}
                    </button>

                    <x-button class="ml-4">
                        {{ __('Se connecter') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
