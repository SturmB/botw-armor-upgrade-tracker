<div class="flex flex-1">
    <form class="flex w-full md:ml-0" action="#" method="GET">
        <label for="search-field" class="sr-only">Search</label>
        <div class="relative w-full text-gray-400 dark:text-gray-600 focus-within:text-gray-600 dark:focus-within:text-gray-400">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                <!-- Heroicon name: mini/magnifying-glass -->
                <svg
                    class="h-5 w-5"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path
                        fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
            <input
                id="search-field"
                class="block h-full w-full border-transparent py-2 pl-8 pr-3 dark:bg-gray-900 text-gray-900 dark:text-gray-100 placeholder-gray-500 focus:border-transparent focus:placeholder-gray-400 dark:focus:placeholder-gray-600 focus:outline-none focus:ring-0 sm:text-sm"
                placeholder="Search"
                type="search"
                name="search"
                wire:model="searchTerm"
                wire:keydown.debounce.500ms="onChange"
                wire:click.debounce="onChange"
            >
        </div>
    </form>
</div>
