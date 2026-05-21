<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TrackEd System') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-slate-50">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            
            <div class="text-center mb-6">
                <a href="/" class="flex flex-col items-center justify-center">
                    <div class="w-16 h-16 bg-indigo-600 text-white rounded-xl flex items-center justify-center text-3xl font-black shadow-lg mb-3">
                        TE
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800 tracking-tight">TrackEd</h1>
                    <p class="text-sm text-gray-500 font-medium">Educational Management System</p>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-2 px-6 py-8 bg-white shadow-lg border-t-4 border-indigo-600 sm:rounded-lg">
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-xs text-gray-400">
                &copy; {{ date('Y') }} TrackEd Systems. All rights reserved.
            </div>
        </div>
    </body>
</html>