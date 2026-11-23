@props(['active' => false])
<a {{ $attributes->merge(['class' => $active ? 'menu-active' : '']) }}>{{ $slot }}</a>
