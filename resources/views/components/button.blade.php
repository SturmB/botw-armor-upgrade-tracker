<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-botw-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-botw-blue-400 active:bg-botw-blue-600 focus:outline-none focus:border-botw-blue-600 focus:ring focus:ring-botw-blue-200 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
