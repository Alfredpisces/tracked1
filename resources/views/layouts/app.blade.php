<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TrackEd') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased" x-data="{ sidebarOpen: false }" @keydown.escape.window="sidebarOpen = false">
    <div class="min-h-screen bg-slate-50 lg:flex">
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-slate-900/50 lg:hidden"
            @click="sidebarOpen = false" aria-hidden="true" x-cloak></div>

        <aside id="mobile-sidebar"
            class="fixed inset-y-0 left-0 z-50 w-72 border-r border-gray-200 bg-white shadow-lg transition-transform duration-200 lg:sticky lg:top-0 lg:h-screen lg:translate-x-0 lg:shadow-none"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" tabindex="-1">
            @include('layouts.navigation')
        </aside>

        <div class="flex min-h-screen flex-1 flex-col">
            <header class="sticky top-0 z-30 border-b border-gray-200 bg-white/95 backdrop-blur">
                <div class="flex h-16 items-center justify-between px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center gap-3">
                        <button type="button"
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 lg:hidden"
                            @click="sidebarOpen = true; $nextTick(() => document.getElementById('primary-sidebar-link')?.focus())"
                            aria-controls="mobile-sidebar" :aria-expanded="sidebarOpen"
                            aria-label="Open navigation menu">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <span class="text-base font-semibold text-gray-900 sm:text-lg">TrackEd</span>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}</p>
                        <p class="text-xs uppercase tracking-wide text-gray-500">{{ Auth::user()->role }}</p>
                    </div>
                </div>
            </header>

            @isset($header)
                <header class="border-b border-gray-200 bg-white">
                    <div class="px-4 py-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-1 overflow-x-auto p-4 sm:p-6 lg:p-8">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
