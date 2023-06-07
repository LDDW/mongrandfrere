<div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="p-4 rounded-lg bg-white shadow-sm">
            <div class="md:flex md:items-center md:justify-between md:gap-3">
                <p class="ml-1 text-black cookie-consent__message">
                    {!! trans('cookie-consent::texts.message') !!}
                    <a href="{{ Route('cookies.policy.show') }}" class="underline text-[#57C5B6]">Politique des cookies</a>
                </p>
                <x-datatable-button label="{!! trans('cookie-consent::texts.agree') !!}" class=" rounded-xl js-cookie-consent-agree cookie-consent__agree px-6 mt-2 mx-auto max-w-xs w-full md:m-0 md:max-w-none md:w-min" color="mgf"/>
            </div>
        </div>
    </div>
</div>
