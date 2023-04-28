<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                        {{ __('Accueil') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('articles') }}" :active="request()->routeIs('articles')">
                        {{ __('Articles') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('formations') }}" :active="request()->routeIs('formations')">
                        {{ __('Formations') }}
                    </x-nav-link>
                </div>
            </div>

            
                @if (Route::has('login'))
                    @auth
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative hidden sm:flex sm:items-center sm:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <div class="flex ">
                                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ 'https://ui-avatars.com/api/?name='. substr(Auth::user()->lastname, 0, 1) . substr(Auth::user()->firstname, 0, 1) .'&color=7F9CF5&background=EBF4FF' }}" alt="{{ Auth::user()->name }}" />
                                        </button>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ Auth::user()->name }}
                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
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
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link href="{{ route('login') }}">
                                {{ __('Connexion') }}
                            </x-nav-link>

                            @if (Route::has('register'))
                                <x-nav-link href="{{ route('register') }}">
                                    {{ __('Inscription') }}
                                </x-nav-link>
                            @endif
                        </div>
                    @endauth
                @endif
            

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="py-2 space-y-1">
            <x-responsive-nav-link href="{{ route('index') }}" :active="request()->routeIs('index')">
                {{ __('Accueil') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('articles') }}" :active="request()->routeIs('articles')">
                {{ __('Articles') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="{{ route('formations') }}" :active="request()->routeIs('formations')">
                {{ __('Formations') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="py-2 border-t border-gray-200">
            @if (Route::has('login'))
                @auth
                    <div class="flex items-center px-4">
                        <div class="shrink-0 mr-3">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                        <div>
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
        
                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-responsive-nav-link href="{{ route('logout') }}"
                                        @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
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
