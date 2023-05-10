<div class="flex flex-grow flex-col overflow-y-auto border-r border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-900 pt-5">
    <a href="{{ route('home') }}" class="flex flex-col flex-shrink-0 items-center justify-center px-4">
        <img
            src="{{ asset('storage/images/icons/BotW-02.png') }}"
            alt="The Legend of Zelda: Breath of the Wild"
            class="w-3/4"
        >
        <h3 class="text-2xl font-bold text-center text-botw-green-600 dark:text-botw-green-400 font-title leading-6">
            {{ __("Armor Upgrade Tracker") }}
        </h3>
    </a>

    <div class="mt-5 flex flex-grow flex-col">
        <div class="relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white dark:bg-gray-900 px-3 text-base font-semibold leading-6 text-gray-900 dark:text-gray-200">
                    {{ __("Shopping List") }}
                </span>
            </div>
        </div>
        <nav class="flex-1 space-y-1 px-4 lg:px-2 pb-4">
            <livewire:shopping-list />
        </nav>
    </div>
</div>
