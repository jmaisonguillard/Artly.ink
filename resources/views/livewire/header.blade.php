<!-- Header with Alpine.js mobile menu state -->
<header x-data="{ isOpen: false }" class="bg-white border-b border-gray-100 relative z-50">
    <div class="max-w-8xl mx-auto">
        <div class="flex items-center justify-between h-20 px-4 sm:px-6 lg:px-8">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="text-2xl font-bold text-purple-600 mr-12">Artly</div>

                <!-- Main Navigation -->
                <nav class="hidden lg:flex space-x-8">
                    <a href="#" class="text-gray-600 hover:text-purple-600 px-3 py-2 font-medium">
                        Explore Artists
                    </a>
                    <a href="#" class="text-gray-600 hover:text-purple-600 px-3 py-2 font-medium">
                        How It Works
                    </a>
                    <a href="#" class="text-gray-600 hover:text-purple-600 px-3 py-2 font-medium">
                        Success Stories
                    </a>
                    <a href="#" class="text-gray-600 hover:text-purple-600 px-3 py-2 font-medium">
                        Pricing
                    </a>
                </nav>
            </div>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-6">
                <!-- Search -->
                <div class="hidden lg:flex items-center">
                    <div class="relative">
                        <input type="text" placeholder="Search artists..."
                            class="w-64 pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Auth Buttons -->
                @guest
                    <div class="hidden lg:flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-purple-600 font-medium">
                            Log in
                        </a>
                        <a href="{{ route('register') }}"
                            class="bg-purple-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-purple-500 transition-colors">
                            Sign up
                        </a>
                    </div>
                @else
                    <div class="hidden lg:flex items-center" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-2 text-gray-600 hover:text-purple-600">
                            <img src="{{ Auth::user()->avatar_url }}"
                                alt="{{ Auth::user()->display_name }}" class="h-8 w-8 rounded-full">
                            <span class="font-medium" wire:poll.5s>{{ Auth::user()->display_name }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                :class="{ 'transform rotate-180': open }" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-[320px] w-48 bg-white rounded-lg shadow-lg py-2">
                            <a href="{{ route('profile.show', Auth::user()->username) }}"
                                class="block px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">Profile</a>
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">Dashboard</a>
                            <a href="{{ route('inbox.index') }}"
                                class="block px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">Inbox</a>
                            @if (Auth::user()->is_artist)
                                <a href="{{ route('services.index') }}"
                                    class="block px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">Services</a>
                                <a href="{{ route('boards.index') }}"
                                    class="block px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">Board</a>
                            @endif
                            <a href="{{ route('settings') }}"
                                class="block px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-gray-600 hover:bg-purple-50 hover:text-purple-600">
                                    Log out
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest

                <!-- Mobile Menu Button -->
                <button @click="isOpen = true" class="lg:hidden text-gray-600 hover:text-purple-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 lg:hidden"
        style="display: none;">
        <!-- Backdrop -->
        <div @click="isOpen = false" x-show="isOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50"></div>

        <!-- Menu Panel -->
        <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
            class="fixed inset-y-0 right-0 w-full max-w-sm bg-white shadow-xl">
            <div class="flex flex-col h-full">
                <!-- Menu Header -->
                <div class="flex items-center justify-between p-6 border-b border-gray-100">
                    <div class="text-2xl font-bold text-purple-600">Artly</div>
                    <button @click="isOpen = false" class="text-gray-400 hover:text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Search -->
                <div class="p-6 border-b border-gray-100">
                    <div class="relative">
                        <input type="text" placeholder="Search artists..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-3 top-2.5"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Navigation Links -->
                <nav class="flex-1 px-6 py-4 overflow-y-auto">
                    <div class="space-y-1">
                        <a href="#"
                            class="block px-3 py-4 text-lg font-medium text-gray-600 hover:text-purple-600 border-b border-gray-100">
                            Explore Artists
                        </a>
                        <a href="#"
                            class="block px-3 py-4 text-lg font-medium text-gray-600 hover:text-purple-600 border-b border-gray-100">
                            How It Works
                        </a>
                        <a href="#"
                            class="block px-3 py-4 text-lg font-medium text-gray-600 hover:text-purple-600 border-b border-gray-100">
                            Success Stories
                        </a>
                        <a href="#"
                            class="block px-3 py-4 text-lg font-medium text-gray-600 hover:text-purple-600 border-b border-gray-100">
                            Pricing
                        </a>
                    </div>
                </nav>

                <!-- Auth Buttons -->
                <div class="p-6 border-t border-gray-100">
                    @guest
                        <a href="{{ route('register') }}"
                            class="block w-full bg-purple-600 text-white px-4 py-3 rounded-lg font-medium hover:bg-purple-500 transition-colors text-center mb-3">
                            Sign up
                        </a>
                        <a href="{{ route('login') }}"
                            class="block w-full text-gray-600 px-4 py-3 rounded-lg font-medium border border-gray-200 hover:bg-gray-50 transition-colors text-center">
                            Log in
                        </a>
                    @else
                        <div class="space-y-1">
                            <div class="flex items-center space-x-3 px-3 py-3 border-b border-gray-100">
                                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::user()->email))) }}?s=32&d=mp"
                                    alt="{{ Auth::user()->display_name }}" class="h-8 w-8 rounded-full">
                                <span class="font-medium text-gray-600">{{ Auth::user()->display_name }}</span>
                            </div>
                            <a href="{{ route('profile.show', Auth::user()) }}"
                                class="block px-3 py-3 text-gray-600 hover:text-purple-600 border-b border-gray-100">
                                Profile
                            </a>
                            <a href="{{ route('dashboard') }}"
                                class="block px-3 py-3 text-gray-600 hover:text-purple-600 border-b border-gray-100">
                                Dashboard
                            </a>
                            <a href="{{ route('inbox.index') }}"
                                class="block px-3 py-3 text-gray-600 hover:text-purple-600 border-b border-gray-100">
                                Inbox
                            </a>
                            @if (Auth::user()->is_artist)
                                <a href="{{ route('services.index') }}"
                                    class="block px-3 py-3 text-gray-600 hover:text-purple-600 border-b border-gray-100">
                                    Services
                                </a>
                                <a href="{{ route('boards.index') }}"
                                    class="block px-3 py-3 text-gray-600 hover:text-purple-600 border-b border-gray-100">
                                    Boards
                                </a>
                            @endif
                            <a href="{{ route('boards.index') }}"
                                class="block px-3 py-3 text-gray-600 hover:text-purple-600 border-b border-gray-100">
                                Boards
                            </a>
                            <a href="{{ route('settings') }}"
                                class="block px-3 py-3 text-gray-600 hover:text-purple-600 border-b border-gray-100">
                                Settings
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-3 py-3 text-gray-600 hover:text-purple-600 border-b border-gray-100">
                                    Log out
                                </button>
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
