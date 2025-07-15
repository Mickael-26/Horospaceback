<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update content style') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
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
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                @if (session('status') === 'style-added')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Added.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    <section class="">
                        <form action="{{ route('save-content.update-section-style') }}" method="POST" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @include('update-content.partials.section-style')
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                @if (session('status') === 'style-added')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Added.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    <section class="">
                        <form action="{{ route('save-content.update-sub-section-style') }}" method="POST" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @include('update-content.partials.sub-section')
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                                @if (session('status') === 'style-added')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('Added.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
