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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Content -->
            <main class="px-4 bg-[#FFF1DC]">
                {{ $slot }}
            </main>
            <footer class="w-full bg-[#57C5B6] px-6 lg:px-20 xl:px-44">
                <div class="pb-3 pt-14 md:flex md:justify-between max-w-7xl mx-auto">

                    <div class="w-44 mb-5 mx-auto max-w-7xl md:m-0">
                        <?xml version="1.0" encoding="UTF-8"?>
                        <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 1080">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #FFF1DC;
                                    }
                                </style>
                            </defs>
                            <g>
                                <g>
                                    <path class="cls-1" d="m1019.9,292.03h-25.8l-60.83-179.12v231.69h-42.82V3.88h43.79l72.53,211.73L1080.26,3.88h45.26v340.71h-44.29V112.91l-61.33,179.12Z"/>
                                    <path class="cls-1" d="m1229.42,0h3.88c51.6,0,82.75,21.9,82.75,72.03v204.42c0,50.13-31.15,72.03-82.75,72.03h-3.88c-51.6,0-82.75-21.9-82.75-72.03V72.03c0-50.63,31.15-72.03,82.75-72.03Zm1.94,308.1c25.3,0,38.94-10.22,38.94-40.4V80.79c0-30.18-13.63-40.4-38.94-40.4s-38.94,10.22-38.94,40.4v186.9c0,30.18,13.63,40.4,38.94,40.4Z"/>
                                    <path class="cls-1" d="m1337.21,344.6V3.88h45.74l85.66,234.6V3.88h42.35v340.71h-43.79l-87.63-242.39v242.39h-42.33Z"/>
                                </g>
                                <g>
                                    <path class="cls-1" d="m1059.83,646.08c0,51.11-31.15,72.05-82.75,72.05h-3.88c-51.6,0-82.75-20.45-82.75-72.05v-204.42c0-49.16,31.15-72.03,82.75-72.03h3.88c51.6,0,82.75,22.87,82.75,72.03v47.22h-45.75v-38.46c0-30.18-13.63-40.4-38.94-40.4s-38.94,10.22-38.94,40.4v186.9c0,30.18,13.63,40.4,38.94,40.4s38.94-10.22,38.94-40.4v-56.95h-40.88v-38.94h86.63v104.65Z"/>
                                    <path class="cls-1" d="m1213.87,714.23l-47.2-139.68h-39.93v139.68h-45.75v-340.71h85.19c51.6,0,82.75,21.92,82.75,72.03v56.95c0,34.08-14.6,55.01-39.93,65.23l51.6,146.5h-46.73Zm-87.13-179.61h37.49c25.3,0,38.94-10.21,38.94-40.38v-39.91c0-30.18-13.63-40.4-38.94-40.4h-37.49v120.7Z"/>
                                    <path class="cls-1" d="m1413.64,633.92h-73l-14.6,80.31h-44.29l67.65-340.71h56.46l68.64,340.71h-46.73l-14.13-80.31Zm-7.29-38.44l-29.21-164.51-29.68,164.51h58.89Z"/>
                                    <path class="cls-1" d="m1495.65,714.23v-340.71h45.74l85.66,234.6v-234.6h42.35v340.71h-43.79l-87.63-242.39v242.39h-42.33Z"/>
                                    <path class="cls-1" d="m1857.47,445.55v196.65c0,50.13-31.15,72.03-82.73,72.03h-84.2v-340.71h84.2c51.58,0,82.73,21.92,82.73,72.03Zm-84.67-31.63h-36.52v259.9h36.52c25.3,0,38.94-10.22,38.94-40.38v-179.12c0-30.18-13.63-40.4-38.94-40.4Z"/>
                                </g>
                                <g>
                                    <path class="cls-1" d="m890.45,739.29h141.62v40.4h-95.89v109.5h80.81v40.9h-80.81v149.91h-45.74v-340.71Z"/>
                                    <path class="cls-1" d="m1186.11,1080l-47.2-139.68h-39.93v139.68h-45.75v-340.71h85.19c51.6,0,82.75,21.92,82.75,72.03v56.95c0,34.08-14.6,55.01-39.93,65.23l51.6,146.5h-46.73Zm-87.13-179.61h37.49c25.3,0,38.94-10.21,38.94-40.38v-39.91c0-30.18-13.63-40.4-38.94-40.4h-37.49v120.7Z"/>
                                    <path class="cls-1" d="m1253.98,1080v-340.71h143.57v40.4h-97.83v107.08h82.75v40.88h-82.75v111.94h99.3v40.4h-145.03Z"/>
                                    <path class="cls-1" d="m1553.03,1080l-47.22-139.68h-39.91v139.68h-45.74v-340.71h85.17c51.6,0,82.75,21.92,82.75,72.03v56.95c0,34.08-14.6,55.01-39.93,65.23l51.6,146.5h-46.73Zm-87.13-179.61h37.49c25.3,0,38.94-10.21,38.94-40.38v-39.91c0-30.18-13.63-40.4-38.94-40.4h-37.49v120.7Z"/>
                                    <path class="cls-1" d="m1620.91,1080v-340.71h143.57v40.4h-97.83v107.08h82.75v40.88h-82.75v111.94h99.3v40.4h-145.03Z"/>
                                </g>
                            </g>
                            <g>
                                <path class="cls-1" d="m740.81,1080c-31.79,0-57.55-25.77-57.55-57.55V504.46c0-25.39-20.66-46.04-46.04-46.04s-46.04,20.66-46.04,46.04v414.39c0,88.86-72.29,161.15-161.15,161.15s-161.15-72.29-161.15-161.15v-207.19c0-25.39-20.66-46.04-46.04-46.04s-46.04,20.66-46.04,46.04v310.79c0,31.79-25.77,57.55-57.55,57.55s-57.55-25.77-57.55-57.55v-310.79c0-88.86,72.29-161.15,161.15-161.15s161.15,72.29,161.15,161.15v207.19c0,25.39,20.66,46.04,46.04,46.04s46.04-20.66,46.04-46.04v-414.39c0-88.86,72.29-161.15,161.15-161.15s161.15,72.29,161.15,161.15v517.99c0,31.79-25.77,57.55-57.55,57.55Z"/>
                                <circle class="cls-1" cx="637.21" cy="125.61" r="125.61"/>
                                <circle class="cls-1" cx="222.82" cy="345.76" r="112.66"/>
                            </g>
                        </svg>
                        <ul class="mt-10 flex justify-between">
                            <li class="p-3 border-[0.5px] border-[#DCF2ED] w-min rounded-full">
                                <a href="" class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #DCF2ED;transform: ;msFilter:;"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"></path></svg>
                                </a>
                            </li>
                            <li class="p-3 border-[0.5px] border-[#DCF2ED] w-min rounded-full">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #DCF2ED;transform: ;msFilter:;"><path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM8.339 18.337H5.667v-8.59h2.672v8.59zM7.003 8.574a1.548 1.548 0 1 1 0-3.096 1.548 1.548 0 0 1 0 3.096zm11.335 9.763h-2.669V14.16c0-.996-.018-2.277-1.388-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248h-2.667v-8.59h2.56v1.174h.037c.355-.675 1.227-1.387 2.524-1.387 2.704 0 3.203 1.778 3.203 4.092v4.71z"></path></svg>
                                </a>
                            </li>
                            <li class="p-3 border-[0.5px] border-[#DCF2ED] w-min rounded-full">
                                <a href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #DCF2ED;transform: ;msFilter:;"><path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056-1.267.056-3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path></svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="md:flex md:gap-16 lg:gap-32">
                        <ul class="mb-5 mx-auto md:m-0">
                            <li class="text-center md:text-left">
                                <a href="" class=" text-white text-lg font-bold">Accueil</a>
                            </li>
                            <li class="text-center md:text-left">
                                <a href="" class=" text-base text-[#DCF2ED]">Présentation de l'entreprise</a>
                            </li>
                            <li class="text-center md:text-left">
                                <a href="" class=" text-base text-[#DCF2ED]">Avis</a>
                            </li>
                            <li class="text-center md:text-left">
                                <a href="" class=" text-base text-[#DCF2ED]">Questions</a>
                            </li>
                            <li class="text-center md:text-left">
                                <a href="" class=" text-base text-[#DCF2ED]">Contact</a>
                            </li>
                        </ul>

                        <ul>
                            <li class="text-center md:text-left">
                                <a href="" class="text-white text-lg font-bold">Nos services</a>
                            </li>
                            <li class="text-center md:text-left">
                                <a href="" class="text-base text-[#DCF2ED]">Formation Gratuite</a>
                            </li>
                            <li class="text-center md:text-left">
                                <a href="" class="text-base text-[#DCF2ED]">Formations Payantes</a>
                            </li>
                            <li class="text-center md:text-left">
                                <a href="" class="text-white text-lg font-bold">Actualités</a>
                            </li>
                            <li class="text-center md:text-left">
                                <a href="" class="text-white text-lg font-bold">Qui sommes-nous ?</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <hr class="border-[0.5px] border-[#DCF2ED] max-w-7xl mx-auto">
                <div class="w-full lg:flex lg:items-center lg:justify-center lg:gap-2 text-sm text-[#DCF2ED] pt-3 pb-8 px-6 text-center lg:text-left">
                    <a href="" class="block underline lg:underline-offset-0">Conditions générales de vente</a>
                    <span class="hidden lg:block">-</span>
                    <a href="" class="block underline">Conditions générales d'utilisation</a>
                    <span class="hidden lg:block">-</span>
                    <a href="" class="block underline">Mentions légales</a>
                    <span class="hidden lg:block">-</span>
                    <a href="" class="block underline">Politique de confidentialité</a>
                    <span class="hidden lg:block">-</span>
                    <p>Copyright 2023 MonGrandFrère</p>
                </div>
            </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>

