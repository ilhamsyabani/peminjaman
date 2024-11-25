@props(['icon'])

@switch($icon)
    @case('eye')
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10 2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zM10 14a4 4 0 100-8 4 4 0 000 8z" clip-rule="evenodd" />
        </svg>
        @break

    @case('edit')
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path d="M17.414 3.586a2 2 0 010 2.828l-11 11a2 2 0 01-1.414.586H4a1 1 0 01-1-1V15.828a2 2 0 01.586-1.414l11-11a2 2 0 012.828 0l1.586 1.586z" />
        </svg>
        @break

    @case('delete')
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M6 2a1 1 0 011 1v1h6V3a1 1 0 112 0v1h1a1 1 0 010 2H3a1 1 0 010-2h1V3a1 1 0 011-1zM5 6h10a1 1 0 011 1v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        @break
@endswitch
