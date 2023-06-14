<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- SEO --}}
        <meta name="keywords" content="Conseils, aide, Orientation professionnelle, développement de carrière, réseau professionnel, employabilité, compétences professionnelles, insertion professionnelle, Services, Lettre de motivation pertinente, formation professionnelle, conseils pour l’emploi, Coach, Coach recherche emploi, coach entretien d'embauche, coach emploi, coaching emploi">
        <meta name="robots" content="index, follow">
        <title>{{ config('app.name', 'MonGrandFrère') }} - @yield('pageTitle')</title>
        <meta name="description" content="@yield('pageDescription')">
        <meta name="author" content="MonGrandFrère">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- CSS for aos -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.min.css', 'resources/js/app.min.js'])

        <!-- Styles -->
        @livewireStyles
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <main class="px-4 bg-[#FFF1DC] min-h-[60vh]">
                {{ $slot }}
            </main>
            <x-footer />
        </div>

        @stack('modals')
        @stack('scripts')

        @livewireScripts
    </body>
</html>

