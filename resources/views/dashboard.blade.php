<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            @if (!Auth::user()->admin())
                @foreach ($themes as $theme)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
                        <div class="p-6 text-gray-900">
                            <div class="text-center my-2">
                                <h2 class="text-lg font-bold">{{ __('Title :') }} {{ $theme->title }}</h2>
                                <p>{{ Str::limit($theme->description, 100) }}</p>
                            </div>
                            <div class="text-center py-2 flex flex-wrap justify-center items-center gap-3">
                                <a href="{{ route('update-content.index', $theme->theme_id) }}"
                                    class="inline-flex items-center my-2 px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Update content style') }}</a>
                                @if (Auth::user()->supervisor())
                                    <form action="{{ route('dashboard.delete-theme', $theme->theme_id) }}"
                                        method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <x-danger-button> {{ __('Delete') }}</x-danger-button>
                                    </form>
                                    @if ($theme->status != 'active')
                                        <form action="{{ route('dashboard.active-theme', $theme->theme_id) }}" method="post" class="">
                                            @method('PUT')
                                            @csrf
                                            <button
                                                class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">{{ __('Activate') }}</button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div>
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Active account') }}</h2>
                </div>
                @foreach ($users as $user)
                    @if ($user->role_id != Auth::user()->role_id)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
                            <div class="p-6 text-gray-900">
                                <div class="text-center my-2">
                                    <h2 class="text-lg font-bold">{{ __('Name :') }} {{ $user->name }}</h2>
                                    <p>{{ __('Role :') }} {{ $user->role->name }} </p>
                                </div>
                                <div class="text-center py-2">
                                    <form action="{{ route('admin.delete-user', $user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <x-danger-button> {{ __('Delete') }}</x-danger-button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
