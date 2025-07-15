<div x-data="{ colorValue: '{{ old($textName, $defaultValue) }}' }">
    <div class="mt-4">
        <x-input-label :for="$colorId" :value="$colorLabel" />
        <input
            type="color"
            :id="$colorId"
            class="mt-1 block w-16 h-10 p-0 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200"
            x-model="colorValue"
        />
        <x-input-error class="mt-2" :messages="$errors->get($colorId)" />
    </div>
    <div class="mt-4">
        <x-input-label :for="$textId" :value="$textLabel" />
        <x-text-input
            :id="$textId"
            :name="$textName"
            type="text"
            class="mt-1 block w-full"
            x-model="colorValue"
        />
        <x-input-error class="mt-2" :messages="$errors->get($textName)" />
    </div>
</div>
