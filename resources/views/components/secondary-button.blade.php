<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-botw-blue-600 uppercase tracking-widest shadow-sm hover:text-botw-blue-400 focus:outline-none focus:border-botw-blue-300 focus:ring focus:ring-botw-blue-200 active:text-botw-blue-700 active:bg-botw-blue-50 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
