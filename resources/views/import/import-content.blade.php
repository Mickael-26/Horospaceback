<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import content') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    <section class="">
                        <div>
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Import new content') }}
                            </h2>
                        </div>
                        <form action="{{ route('import.store-content') }}" method="POST" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <x-file-input name="file" id="file" label="Import an Excel file"
                                    accept=".xlsx,.xls,.csv" />
                            </div>
                            <x-select-categories :label="__('Choose an category')" name="category_id" :options="$categories"
                                :selected="old('category_id')" required />
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Import') }}</x-primary-button>
                                @if (session('status') === 'file-imported')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('File imported successfully.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            @if (session('status') === 'file-imported')
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    <section class="">
                        <form action="{{ route('update-content.update-theme-style') }}" method="POST" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div>
                                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                    {{ __('Select theme') }}</h2>
                            </div>
                            <x-select-theme :label="__('Select a theme:')" name="theme_id" :options="$themes" required
                                :selected="old('theme_id')" />
                            @include('update-content.partials.zodiac-style-theme')
                            @include('update-content.partials.form-contact-style')
                            @include('update-content.partials.medias')
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('SAVE') }}</x-primary-button>
                                @if (session('status') === 'style-added')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Added.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            @elseif (session('status') === 'style-added')
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl mx-auto">
                        <section class="">
                            <form action="{{ route('create-intro-style') }}" method="POST"
                                class="mt-6 space-y-6" enctype="multipart/form-data">
                                @csrf
                                @include('import.partials.intro-style')
                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('SAVE') }}</x-primary-button>
                                    @if (session('status') === 'style-added')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600">{{ __('Added.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
