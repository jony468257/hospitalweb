<nav x-data="{ open: false }" class="bg-white border-b border-slate-100 sticky top-0 z-50 shadow-sm shadow-slate-100/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2 group">
                        <div class="bg-primary p-2 rounded-card group-hover:rotate-12 transition-transform duration-300">
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <span class="text-h2 text-primary tracking-tight font-bold">MediConnect</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-8 sm:flex">
                    <a href="{{ route('public.hospital.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-body font-medium leading-5 text-secondary hover:text-primary hover:border-primary transition duration-150 ease-in-out">
                        Hospitals
                    </a>
                    <a href="{{ route('public.doctor.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-body font-medium leading-5 text-secondary hover:text-primary hover:border-primary transition duration-150 ease-in-out">
                        Doctors
                    </a>
                    <a href="{{ route('public.medicine.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-body font-medium leading-5 text-secondary hover:text-primary hover:border-primary transition duration-150 ease-in-out">
                        Pharmacy
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown / Auth -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-4">
                @auth
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-body leading-4 font-medium rounded-card text-secondary bg-slate-50 hover:text-primary focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ms-1 italic text-small text-muted">({{ str_replace('_', ' ', Auth::user()->role) }})</div>
                                    <div class="ms-2">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-body font-medium text-secondary hover:text-primary transition duration-150">Login</a>
                    <x-button variant="primary" size="sm" href="{{ route('register') }}">Get Started</x-button>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-card text-secondary hover:text-primary hover:bg-slate-100 focus:outline-none focus:bg-slate-100 focus:text-primary transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-t border-slate-100">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('public.hospital.index')">
                Hospitals
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('public.doctor.index')">
                Doctors
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('public.medicine.index')">
                Pharmacy
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-2 border-t border-slate-100">
            @auth
                <div class="px-4">
                    <div class="font-bold text-h2 text-secondary">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-body text-muted">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                <div class="px-4 space-y-2">
                    <x-button variant="outline" class="w-full" href="{{ route('login') }}">Login</x-button>
                    <x-button variant="primary" class="w-full" href="{{ route('register') }}">Register</x-button>
                </div>
            @endauth
        </div>
    </div>
</nav>
