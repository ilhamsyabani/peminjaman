@props([
    'label' => null,
    'id' => null,
    'name' => null,
    'placeholder' => null,
    'type' => 'text',
    'width' => 'full',
])

@php
    $widthClasses = match ($width) {
        'sm' => 'w-[200px]',
        'md' => 'w-[400px]',
        'full' => 'w-full',
        'auto' => '',
    };
    $wireModel = $attributes->get('wire:model');
@endphp

<div>
    @if ($label)
        <label for="{{ $id ?? '' }}" class="block text-sm font-medium leading-5 text-gray-00 dark:text-gray-300">
            {{ $label }}
        </label>
    @endif

    <div class="relative mt-1.5 rounded-md shadow-sm" x-data x-init="new Pikaday({
        field: $refs.dateInput,
        format: 'YYYY-MM-DD',
        toString(date, format) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${year}/${month}/${day}`;
        },
        onSelect: function() {
            @if ($wireModel) $wire.set('{{ $wireModel }}', moment(this.getDate()).format('YYYY-MM-DD')); @endif
        }
    });">

        <!-- Calendar Icon -->
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-5 4h6a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2h6zM5 11h14" />
            </svg>
        </div>

        <!-- Input Field -->
        <input x-ref="dateInput" {{ $attributes->whereStartsWith('wire:model') }} id="{{ $id ?? '' }}"
            name="{{ $name ?? '' }}" type="{{ $type }}" placeholder="{{ $placeholder ?? '' }}"
            class="appearance-none pl-10 {{ $widthClasses }} h-10 px-3 py-2 text-sm bg-white dark:text-gray-300 dark:bg-white/[4%] border rounded-md border-gray-200 dark:border-white/10 ring-offset-background placeholder:text-gray-500 dark:placeholder:text-gray-400 dark:focus:border-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200/60 dark:focus:ring-white/20 disabled:cursor-not-allowed disabled:opacity-50 @error($wireModel) text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"
            required autofocus />
    </div>

    <!-- Error Message -->
    @if ($wireModel)
        @error($wireModel)
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    @endif
</div>
