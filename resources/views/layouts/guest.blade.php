<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gradient-to-b from-gray-100 to-gray-200 min-h-screen flex items-center justify-center">

    <div class="w-full sm:max-w-md mx-4 sm:mx-0">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <a href="/">
                <x-application-logo class="w-24 h-24 text-gray-700 hover:text-gray-900 transition-transform duration-300 transform hover:scale-105" />
            </a>
        </div>

        <!-- Content Card -->
        <div class="bg-white shadow-lg rounded-xl p-8 sm:p-10 overflow-hidden">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
