@props([
    'label' => null,
    'id' => null,
    'name' => null,
    'options' => [],
    'selected' => null,
    'status' => 'Pilih salah satu',
    'display' => null,
    'class' => null,
    'componet' => null,
])

@php
    $wireModel = $attributes->get('wire:model');
@endphp

<div class="{{$display}};" id="{{ $componet }}">
    <label for="{{ $id }}" class="{{ $class }} mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $label }}
    </label>

    <div class="mt-1.5 rounded-md shadow-sm">
        <select 
            {{ $attributes->whereStartsWith('wire:model') }} 
            id="{{ $id }}" 
            name="{{ $name }}"
            class="{{$class}} min-w-48 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
            <option>{{ $status }}</option>
            @foreach ($options as $idOption => $option)
                <option value="{{ $idOption }}" @if ($selected && $idOption === $selected) selected @endif>
                    {{ $option }}
                </option>
            @endforeach
        </select>

        @error($wireModel)
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
