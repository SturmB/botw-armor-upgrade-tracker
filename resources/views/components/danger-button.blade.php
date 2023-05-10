<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-red-600 dark:bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-500 dark:hover:bg-red-400 focus:outline-none focus:border-red-700 dark:focus:border-red-600 focus:ring focus:ring-red-200 dark:focus:ring-red-800 active:bg-red-600 dark:active:bg-red-700 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
