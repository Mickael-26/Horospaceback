@props([
    'label' => '',
    'name',
    'options' => [],
    'selected' => null,
    'required' => false,
])
@if ($options[0] != null)
    <div class="mb-4">
        @if ($label)
            <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
                {{ $label }}
            </label>
        @endif

        <select name="{{ $name }}" id="{{ $name }}" @if ($required) required @endif
            {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}>
            <option value="{{ $options[0]->id }}">{{ $options[0]->slug}}</option>
        </select>

        @error($name)
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>
@else
    <div class="mb-4">
        @if ($label)
            <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
                {{ $label }}
            </label>
        @endif
        <select name="{{ $name }}" id="{{ $name }}" @if ($required) required @endif
            {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}>
            <option value="{{ $options->id }}">{{ $options->themeContents->first()->slug }}</option>
        </select>
    </div>
@endif
