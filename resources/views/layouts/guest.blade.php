<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.25.1/filepond.min.css" integrity="sha512-YmQexe70oShhZYDBrFABk/ZKWmMVs4fe+2bSI5+bDOEQRsTmuE3ErA0Dl/X6248XaMdU1TPH/7K2pe3sNQXXbQ==" crossorigin="anonymous" />
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.25.1/filepond.min.js" integrity="sha512-qXR2WH5q2wmugbujUyogX8wdI/sJ1FK4sYcKvO0QQq4Tw0aKxljqPQ2u0wUpUtv8d/5QszpTjHnUb8yKtyg7Yg==" crossorigin="anonymous"></script>
        @yield('scripts')
        @livewireScripts
    </body>
</html>
