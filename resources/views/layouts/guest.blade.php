<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased min-h-screen flex flex-col bg-gray-100">

        <!-- Nav -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-xl font-bold text-indigo-600">
                    {{ config('app.name', 'Expiry Tracking System') }}
                </a>
            </div>
        </nav>

        <!-- Content -->
        <main class="flex-1 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="mb-6">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-indigo-600">
                    {{ config('app.name', 'Expiry Tracking System') }}
                </a>
            </div>

            <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </main>

        @include('layouts.footer')

    </body>
</html>