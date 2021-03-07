<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 w-6/12 sm:w-4/12 px-4">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        {{ __('Your avatar:') }}
                        <br />
                        <img src="{{!empty(auth()->user()->avatar) ? route('avatar', ['userId' => auth()->user()->id]) : auth()->user()->getFirstMediaUrl('avatars') }}" class="shadow rounded w-auto h-auto align-middle border-none"/>
                        <br />
                        <input type="file" name="avatars" id="avatars" multiple data-max-files="1">
                        <br /><br />
                        <x-button>{{ __('Update') }}</x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>