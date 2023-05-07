@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-botw-blue-300 focus:ring focus:ring-botw-blue-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}>
