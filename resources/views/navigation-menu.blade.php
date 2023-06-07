<nav x-data="{ open: false }" class="border-gray-100 bg-[#FFF1DC] px-6 lg:px-20 xl:px-44 lg:py-5 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto lg:px-8 lg:border lg:border-[#57C5B6] lg:rounded-3xl max-w-7xl">
        <div class="flex justify-between h-16">

            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('index') }}">
                    <x-application-mark class="block h-9 w-auto" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-4 xl:space-x-8 lg:-my-px lg:ml-10 lg:flex">
                <x-nav-link href="{{ route('index') }}">
                    {{ __('Accueil') }}
                </x-nav-link>
                <x-nav-link href="{{ route('formations') }}">
                    {{ __('Nos services') }}
                </x-nav-link>
                <x-nav-link href="{{ route('articles') }}">
                    {{ __('Actualités') }}
                </x-nav-link>
                <x-nav-link href="{{ route('formations') }}">
                    {{ __('Qui sommes-nous ?') }}
                </x-nav-link>
            </div>
            
                @if (Route::has('login'))
                    @auth
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative hidden lg:flex lg:items-center lg:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <div class="flex ">
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ 'https://ui-avatars.com/api/?name='. substr(Auth::user()->lastname, 0, 1) . substr(Auth::user()->firstname, 0, 1) .'&color=57C5B6&background=EBF4FF' }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ Auth::user()->name }}
                                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    </div>
                                </x-slot>

                                <x-slot name="content">

                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Mon compte') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Formations') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Commandes') }}
                                    </x-dropdown-link>

                                    @if (Auth::user() && Auth::user()->admin === 1)
                                        <x-dropdown-link href="{{ route('admin.dashboard') }}">
                                            {{ __('Tableau de bord admin') }}
                                        </x-dropdown-link>
                                    @endif

                                    <div class="border-t border-gray-200"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="text-red-400">
                                            {{ __('Déconnexion') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <div class="hidden space-x-1 lg:-my-px lg:ml-10 lg:flex">
                            @if (Route::has('register'))
                                <x-nav-link href="{{ route('register') }}">
                                    <button class="bg-[#57C5B6] text-[#20484F] py-2.5 px-4 rounded-lg">Inscription</button>
                                </x-nav-link>
                            @endif

                            <x-nav-link href="{{ route('login') }}" class="">
                                <button class="bg-white text-[#072125] py-2.5 px-4 rounded-lg">Connexion</button>
                            </x-nav-link>
                        </div>
                    @endauth
                @endif
            

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-[#57C5B6] hover:text-[#57C5B6] hover:bg-[#DFEEEC] focus:outline-none focus:bg-[#DFEEEC] focus:text-[#57C5B6] transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        <div class="py-2 space-y-1">
            <x-responsive-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                {{ __('Accueil') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('formations') }}" :active="request()->routeIs('formations')">
                {{ __('Nos services') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('articles') }}" :active="request()->routeIs('articles')">
                {{ __('Actualités') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('formations') }}" :active="request()->routeIs('formations')">
                {{ __('Qui sommes-nous ?') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="py-2 border-t border-[#57C5B6]">
            @if (Route::has('login'))
                @auth
                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Mon compte') }}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Formations') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Commandes') }}
                        </x-responsive-nav-link>

                        @if (Auth::user() && Auth::user()->admin === 1)
                            <x-responsive-nav-link href="{{ route('admin.dashboard') }}">
                                {{ __('Tableau de bord admin') }}
                            </x-responsive-nav-link>
                        @endif
        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-responsive-nav-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                {{ __('Déconnexion') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                @else
                    <x-responsive-nav-link href="{{ route('login') }}">
                        {{ __('Connexion') }}
                    </x-responsive-nav-link>
                    @if (Route::has('register'))
                        <x-responsive-nav-link href="{{ route('register') }}">
                            {{ __('Inscription') }}
                        </x-responsive-nav-link>
                    @endif
                @endauth
            @endif
        </div>
        
    </div>
</nav>
