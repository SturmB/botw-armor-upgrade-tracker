<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/8ea7ba55a2.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <button
            type="button"
            id="theme-toggle"
            class="absolute top-0 end-0 rounded-full bg-gray-100 dark:bg-gray-800 m-4 p-1 h-10 w-10 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none focus:ring-2 focus:ring-botw-blue-400 dark:focus:ring-botw-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900"
        >
            <span class="sr-only">Toggle dark mode</span>
            <div id="theme-toggle-dark-icon" class="hidden">
                <i class="fa-duotone fa-moon-stars fa-xl"></i>
            </div>
            <div id="theme-toggle-light-icon" class="hidden">
                <i class="fa-duotone fa-sun-bright fa-xl"></i>
            </div>
        </button>
        <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
