@props([
    'id' => 'file',
    'name' => 'file',
    'label' => 'Upload File',
    'accept' => '', // e.g. '.pdf,.docx,image/*'
    'required' => false,
])

<div class="mt-4">
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">{{ __($label) }}</label>
    <input type="file" id="{{ $id }}" name="{{ $name }}" {{ $accept ? "accept=$accept" : '' }}
        @if ($required) required @endif
        {{ $attributes->merge(['class' => 'mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100']) }}>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>