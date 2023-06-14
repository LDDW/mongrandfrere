<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @if (isset($css)){{ $css }}@endif
        <!-- Scripts -->
        @toastScripts
        @vite(['resources/css/app.min.css', 'resources/js/app.min.js'])
        @livewireStyles
    </head> 
    <body class="font-sans antialiased">
        <x-banner />
        <livewire:toasts />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu-admin')
            <!-- Page Content -->
            <main class="mx-auto px-4 sm:px-6 lg:px-20 py-12">
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
