<x-admin-layout>

    {{-- quill css --}}

    <x-slot name="css">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    </x-slot>

    {{-- back link --}}

    <a href="{{ Route('admin.articles') }}" class="flex items-center gap-3 mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        <span>Retour</span>
    </a>

    {{-- form store and update article --}}

    @livewire('form-article', [
        'article' => isset($article) ? $article : null,
    ])

    {{-- quill js --}}

    @push('scripts')
        @yield('js')
    @endpush
       
</x-admin-layout>