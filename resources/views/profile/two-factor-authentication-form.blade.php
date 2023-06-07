<x-action-section>
    <x-slot name="title">
        {{ __('Authentification à deux facteurs') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ajoutez une sécurité supplémentaire à votre compte en utilisant l\'authentification à deux facteurs.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('Terminer l\'activation de l\'authentification à deux facteurs.') }}
                @else
                    {{ __('Vous avez activé l\'authentification à deux facteurs.') }}
                @endif
            @else
                {{ __('Vous n\'avez pas activé l\'authentification à deux facteurs.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>
                {{ __('Lorsque l\'authentification à deux facteurs est activée, un jeton sécurisé et aléatoire vous est demandé lors de l\'authentification. Vous pouvez récupérer ce jeton à partir de l\'application Google Authenticator de votre téléphone..') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            {{ __('Pour terminer l\'activation de l\'authentification à deux facteurs, scannez le code QR suivant à l\'aide de l\'application d\'authentification de votre téléphone ou entrez la clé de configuration et fournissez le code OTP généré..') }}
                        @else
                            {{ __('L\'authentification à deux facteurs est maintenant activée. Scannez le code QR suivant à l\'aide de l\'application d\'authentification de votre téléphone ou entrez la clé de configuration..') }}
                        @endif
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Clé de configuration') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-label for="code" value="{{ __('Code') }}" />

                        <x-input id="code" type="text" name="code" class="block mt-1 w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model.defer="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        {{ __('Conservez ces codes de récupération dans un gestionnaire de mots de passe sécurisé. Ils peuvent être utilisés pour récupérer l\'accès à votre compte en cas de perte de votre dispositif d\'authentification à deux facteurs..') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-datatable-button wire:loading.attr="disabled" label="Activer" class="rounded-xl uppercase" color="mgf"/>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-datatable-button label="Codes de récupération de Regenerate" class="rounded-xl uppercase border border-gray-300" color="white" />
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-datatable-button wire:loading.attr="disabled" label="Confirmer" class="rounded-xl uppercase ml-4" color="mgf"/>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">
                        <x-datatable-button label="Afficher les codes de récupération" class="rounded-xl uppercase border border-gray-300" color="white" />
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-datatable-button wire:loading.attr="disabled" label="Annuler" class="rounded-xl uppercase border border-gray-300" color="white" />
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-datatable-button wire:loading.attr="disabled" label="Désactiver" class="rounded-xl uppercase" color="red-danger" />
                    </x-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-action-section>
