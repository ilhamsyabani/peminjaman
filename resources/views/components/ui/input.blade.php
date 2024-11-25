@props([
    'label' => null,
    'id' => null,
    'name' => null,
    'placeholder' => null,
    'type' => 'text',
    'width' => 'full'
])

@php
$widthClasses = match ($width) {
    'sm' => 'w-[16rem]',
    'md' => 'w-[31.5rem]',
    'full' => 'w-full',
    'auto' => ''
};

@endphp
@php $wireModel = $attributes->get('wire:model'); @endphp

<div>
    @if($label)
        <label for="{{ $id ?? '' }}" class="block text-sm font-medium leading-5 text-gray-700 dark:text-gray-300">
            {{ $label  }}
        </label>
    @endif

    <div data-model="{{ $wireModel }}" class="mt-1.5 rounded-md shadow-sm">
        <input {{ $attributes->whereStartsWith('wire:model') }} id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" type="{{ $type ?? '' }}" required autofocus placeholder="{{ $placeholder ?? '' }}" class="appearance-none flex {{ $widthClasses }} h-10 px-3 py-2 text-sm bg-white dark:text-gray-300 dark:bg-white/[4%] border rounded-md border-gray-200 dark:border-white/10 ring-offset-background placeholder:text-gray-500 dark:placeholder:text-gray-400 dark:focus:border-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200/60 dark:focus:ring-white/20 disabled:cursor-not-allowed disabled:opacity-50 @error($wireModel) text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
    </div>

    @error($wireModel)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>