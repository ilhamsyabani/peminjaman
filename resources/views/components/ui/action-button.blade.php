<a href="{{ $url ?? '#' }}" class="px-3 py-2 rounded {{ $class ?? '' }}" {!! $attributes !!}>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
        {{ $slot }}
    </svg>
</a>
