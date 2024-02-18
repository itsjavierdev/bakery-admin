@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center px-3 py-2 bg-yellow-500 rounded-lg text-sm font-bold leading-5 text-white focus:outline-none hover:text-white  transition duration-150 ease-in-out' : 'inline-flex items-center px-3 py-2 text-sm font-medium leading-5 text-gray-300 hover:text-white hover:bg-gray-600 rounded-lg transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
