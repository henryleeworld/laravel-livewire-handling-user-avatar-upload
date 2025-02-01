<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        {{ __('Your avatar: ') }}
                        <br />
                        <img src="{{!empty(auth()->user()->avatar) ? route('avatar', ['userId' => auth()->user()->id]) : auth()->user()->getFirstMediaUrl('avatars') }}" class="shadow rounded w-auto h-auto align-middle border-none"/>
                        <br />
                        <input type="file" name="avatars" id="avatars" multiple data-max-files="1">
                        <br /><br />
                        <x-primary-button>{{ __('Update') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>