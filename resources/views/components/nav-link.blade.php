@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#57C5B6] text-sm hover:text-[#57C5B6] focus:text-[#57C5B6] leading-5 text-gray-800 focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm hover:text-[#57C5B6] focus:text-[#57C5B6] leading-5 text-gray-800 focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
