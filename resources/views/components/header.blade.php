<div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white dark:bg-gray-900 shadow">
    <button type="button" @click="sidebarOpen = !sidebarOpen" class="border-r border-gray-200 dark:border-gray-600 px-4 text-gray-500 border:text-gray-300 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-botw-blue-500 dark:focus:ring-botw-blue-300 md:hidden">
        <span class="sr-only">Open sidebar</span>
        <!-- Heroicon name: outline/bars-3-bottom-left -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
        </svg>
    </button>
    <div class="flex flex-1 justify-between px-4">
        <livewire:search />
        <div class="ml-4 flex items-center md:ml-6">
            <button
                type="button"
                id="theme-toggle"
                class="rounded-full bg-white dark:bg-gray-900 mr-2 p-1 h-10 w-10 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-botw-blue-400 dark:focus:ring-botw-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
            >
                <span class="sr-only">Toggle dark mode</span>
                <div id="theme-toggle-dark-icon" class="hidden">
                    <i class="fa-duotone fa-moon-stars fa-xl"></i>
                </div>
                <div id="theme-toggle-light-icon" class="hidden">
                    <i class="fa-duotone fa-sun-bright fa-xl"></i>
                </div>
            </button>

            <!-- Profile dropdown -->
            @auth
                <div x-data="{ profileMenuOpen: false }" class="relative ml-3">
                    <div>
                        <button type="button" @click="profileMenuOpen = !profileMenuOpen" class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-botw-blue-400 dark:focus:ring-botw-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                        </button>
                    </div>

                    <!-- Dropdown menu, show/hide based on menu state. -->
                    <div
                        x-show="profileMenuOpen"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white dark:bg-gray-900 py-1 shadow-lg ring-1 ring-black dark:ring-gray-600 ring-opacity-5 focus:outline-none"
                        role="menu"
                        aria-orientation="vertical"
                        aria-labelledby="user-menu-button"
                        tabindex="-1"
                    >
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300" role="menuitem" tabindex="-1" id="user-menu-item-0">
                            {{ __("Your Profile") }}
                        </a>

                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <a href="{{ route('logout') }}" @click.prevent="$root.submit();" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300" role="menuitem" tabindex="-1" id="user-menu-item-1">
                                {{ __("Sign out") }}
                            </a>
                        </form>
                    </div>
                </div>
            @else
                <a type="button" href="{{ route('login') }}" class="inline-flex items-center rounded-md border border-transparent bg-botw-blue-500 dark:bg-botw-blue-400 px-4 py-2 text-sm font-medium text-white dark:text-botw-blue-900 shadow-sm hover:bg-botw-blue-600 dark:hover:bg-botw-blue-300 focus:outline-none focus:ring-2 focus:ring-botw-blue-400 dark:focus:ring-botw-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 mx-2">
                    {{ __("Log in") }}
                </a>

                @if (Route::has('register'))
                    <a type="button" href="{{ route('register') }}" class="inline-flex items-center rounded-md border border-transparent bg-botw-blue-100 dark:bg-botw-blue-800 px-4 py-2 text-sm font-medium text-botw-blue-600 dark:text-botw-blue-300 hover:bg-botw-blue-200 dark:hover:bg-botw-blue-700 focus:outline-none focus:ring-2 focus:ring-botw-blue-400 dark:focus:ring-botw-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 ml-2">
                        {{ __("Register") }}
                    </a>
                @endif
            @endauth
        </div>
    </div>
</div>
