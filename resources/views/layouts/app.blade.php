<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script>
            // On page load or when changing themes, best to add inline in `head` to avoid FOUC
            if (localStorage.theme === "dark"
                || (!("theme" in localStorage)
                    && window.matchMedia("(prefers-color-scheme: dark)").matches)
            ) {
                document.documentElement.classList.add("dark");
            } else {
                document.documentElement.classList.remove("dark");
            }
        </script>

        <!-- Favicons! -->
        <link rel="apple-touch-icon-precomposed" href="{{ asset('storage/images/icons/favicons/favicon-180.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('storage/images/icons/favicons/favicon-152.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('storage/images/icons/favicons/favicon-120.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('storage/images/icons/favicons/favicon-76.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('storage/images/icons/favicons/favicon-57.png') }}">
        <link rel="mask-icon" href="{{ asset('storage/images/icons/favicons/icon.svg') }}" color="#302816">
        <link rel="shortcut icon" sizes="196x196" href="{{ asset('storage/images/icons/favicons/favicon-196.png') }}">

        <link rel="icon" href="{{ asset('storage/images/icons/favicons/favicon-228.png') }}" sizes="228x228">
        <link rel="icon" href="{{ asset('storage/images/icons/favicons/favicon-195.png') }}" sizes="195x195">
        <link rel="icon" href="{{ asset('storage/images/icons/favicons/favicon-144.png') }}" sizes="144x144">
        <link rel="icon" href="{{ asset('storage/images/icons/favicons/favicon-128.png') }}" sizes="128x128">
        <link rel="icon" href="{{ asset('storage/images/icons/favicons/favicon-96.png') }}" sizes="96x96">
        <link rel="icon" href="{{ asset('storage/images/icons/favicons/favicon-32.png') }}" sizes="32x32">

        <meta name="msapplication-TileColor" content="#302816">
        <meta name="msapplication-TileImage" content="{{ asset('storage/images/icons/favicons/favicon-144.png') }}">
        <meta name="application-name" content="{{ config('app.name', 'Laravel') }}">
        <meta name="msapplication-tooltip" content="{{ config('app.name', 'Laravel') }}">
        <meta name="msapplication-config" content="{{ asset('storage/images/icons/favicons/ieconfig.xml') }}">
        <!-- End Favicons -->

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/8ea7ba55a2.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased h-full bg-gray-100 dark:bg-gray-800 dark:text-gray-200">
        <x-banner />

        <div x-data="{ sidebarOpen: false }">
            <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
            <div
                x-show="sidebarOpen"
                class="relative z-40 md:hidden"
                role="dialog"
                aria-modal="true"
            >
                <!-- Off-canvas menu backdrop, show/hide based on off-canvas menu state. -->
                <div
                    x-show="sidebarOpen"
                    x-transition:enter="transition-opacity ease-linear duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-linear duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-gray-600 dark:bg-gray-800 bg-opacity-75 dark:bg-opacity-75"
                ></div>

                <div class="fixed inset-0 z-40 flex">
                    <!-- Off-canvas menu, show/hide based on off-canvas menu state. -->
                    <div
                        x-show="sidebarOpen"
                        x-transition:enter="transition ease-in-out duration-300 transform"
                        x-transition:enter-start="-translate-x-full"
                        x-transition:enter-end="translate-x-0"
                        x-transition:leave="transition ease-in-out duration-300 transform"
                        x-transition:leave-start="translate-x-0"
                        x-transition:leave-end="-translate-x-full"
                        class="relative flex w-full max-w-xs flex-1 flex-col bg-white dark:bg-black pb-4"
                    >
                        <!-- Close button, show/hide based on off-canvas menu state. -->
                        <div
                            x-show="sidebarOpen"
                            x-transition:enter="ease-in-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in-out duration-300"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="absolute top-0 right-0 -mr-12 pt-2"
                        >
                            <button @click="sidebarOpen = !sidebarOpen" type="button" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white dark:focus:ring-gray-300">
                                <span class="sr-only">Close sidebar</span>
                                <!-- Heroicon name: outline/x-mark -->
                                <svg class="h-6 w-6 text-white dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Sidebar component -->
                        <x-sidebar />
                    </div>

                    <div class="w-14 flex-shrink-0" aria-hidden="true">
                        <!-- Dummy element to force sidebar to shrink to fit close icon -->
                    </div>
                </div>
            </div>

            <!-- Static sidebar for desktop -->
            <div class="hidden md:fixed md:inset-y-0 md:flex md:w-64 md:flex-col">
                <!-- Sidebar component -->
                <x-sidebar />
            </div>

            <div class="flex flex-1 flex-col md:pl-64">
                <!-- Header -->
                <x-header />

                <!-- Main -->
                <main class="flex-1">
                    <div class="py-6">
                        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
                            {{ $slot }}
                        </div>
                    </div>
                </main>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        <x-livewire-range-slider::scripts />
    </body>
</html>
