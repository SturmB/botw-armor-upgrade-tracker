<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-botw-blue-500 dark:bg-botw-blue-400 border border-transparent rounded-md font-semibold text-xs text-white dark:text-botw-blue-900 uppercase tracking-widest hover:bg-botw-blue-400 dark:hover:bg-botw-blue-300 active:bg-botw-blue-600 dark:active:bg-botw-blue-500 focus:outline-none focus:border-botw-blue-600 dark:focus:border-botw-blue-600 focus:ring focus:ring-botw-blue-200 dark:focus:ring-botw-blue-700 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
