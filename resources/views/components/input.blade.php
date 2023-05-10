@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'dark:bg-gray-900 dark:text-gray-50 border-gray-300 dark:border-gray-700 focus:border-botw-blue-300 dark:focus:border-botw-blue-700 focus:ring focus:ring-botw-blue-200 dark:focus:ring-botw-blue-800 focus:ring-opacity-50 dark:focus:ring-offset-gray-950 rounded-md shadow-sm']) !!}>
