@props([
    'label' => '',
    'name',
    'options' => [],
    'selected' => null,
    'required' => false,
])

<div class="mb-4">
    @if ($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
        </label>
    @endif

    <select name="{{ $name }}" id="{{ $name }}" @if ($required) required @endif
        {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}>
        <option value="">{{ __('Select') }}</option>
        @foreach ($options as $mainGroupLabel => $groupLabel)
            <optgroup label="{{ $mainGroupLabel }}">
                @foreach ($groupLabel as $subLabel => $groupOptions)
            <optgroup label="{{ $subLabel }}">
                @foreach ($groupOptions as $option)
                    <option value="{{ $option->id }}" @selected($option->id == $selected)>
                        {{ $option->subSection }}
                    </option>
                @endforeach
            </optgroup>
        @endforeach
        </optgroup>
        @endforeach
    </select>

    @error($name)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>
