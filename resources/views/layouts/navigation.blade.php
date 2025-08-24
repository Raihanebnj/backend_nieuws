<nav x-data="{ open: false }" class="bg-white shadow-md border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex-shrink-0">
                    <x-application-logo class="h-10 w-auto text-gray-900" />
                </a>

                <!-- Desktop Menu -->
                <div class="hidden sm:flex sm:space-x-8 sm:ml-10">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Home</x-nav-link>
                    <x-nav-link :href="route('nieuwsitems.index')" :active="request()->routeIs('nieuwsitems.index')">Nieuwsitems</x-nav-link>
                    <x-nav-link :href="route('faq.index')" :active="request()->routeIs('faq.index')">FAQ</x-nav-link>
                    <x-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.create')">Contact</x-nav-link>
                    
                    @if(auth()->check() && auth()->user()->isAdmin())
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">Beheer</x-nav-link>
                    @endif
                </div>
            </div>

            <!-- Auth Links / Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center px-4 py-2 border border-gray-200 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition">
                                {{ Auth::user()->name }}
                                <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition">Login</a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 rounded-md text-gray-600 hover:text-gray-800 hover:bg-gray-50 transition">Register</a>
                    @endif
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-white border-t border-gray-200">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">Home</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('nieuwsitems.index')" :active="request()->routeIs('nieuwsitems.index')">Nieuwsitems</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('faq.index')" :active="request()->routeIs('faq.index')">FAQ</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.create')">Contact</x-responsive-nav-link>
            
            @if(auth()->check() && auth()->user()->isAdmin())
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">Beheer</x-responsive-nav-link>
            @endif
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            @auth
                <div class="px-4 mb-3">
                    <div class="font-semibold text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <x-responsive-nav-link :href="route('profile.edit')">Profile</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-responsive-nav-link>
                </form>
            @else
                <div class="px-4">
                    @if (Route::has('login'))
                        <x-responsive-nav-link :href="route('login')">Login</x-responsive-nav-link>
                    @endif
                    @if (Route::has('register'))
                        <x-responsive-nav-link :href="route('register')">Register</x-responsive-nav-link>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</nav>
