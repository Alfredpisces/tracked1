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

<<<<<<< HEAD
<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-slate-50">
        {{-- Mobile top bar (hamburger) --}}
        <header
            class="sticky top-0 z-40 flex items-center gap-3 border-b border-gray-200 bg-white/80 px-4 py-3 backdrop-blur sm:px-6 lg:hidden">
            <button type="button" @click="sidebarOpen = true" aria-label="Open navigation"
                class="inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
                </svg>
            </button>

            <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                <div
                    class="flex h-9 w-9 items-center justify-center rounded bg-indigo-600 text-sm font-bold text-white">
                    TE</div>
                <span class="text-base font-semibold text-gray-900">TrackEd</span>
            </a>

            <div class="ms-auto">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-2 rounded-md border border-gray-200 bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:border-gray-300 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <span class="max-w-[10rem] truncate">{{ Auth::user()->first_name }}
                                {{ Auth::user()->last_name }}</span>
                            <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 text-xs text-gray-400 border-b border-gray-100">
                            Role: <span class="uppercase font-bold">{{ Auth::user()->role }}</span>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile Settings') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-red-600 hover:bg-red-50">
                                {{ __('Secure Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </header>

        <div class="flex">
            {{-- Desktop sidebar --}}
            <aside
                class="sticky top-0 hidden h-screen w-72 shrink-0 border-r border-gray-200 bg-white lg:flex lg:flex-col">
                <div class="flex items-center gap-2 px-6 py-5">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <div
                            class="flex h-9 w-9 items-center justify-center rounded bg-indigo-600 text-sm font-bold text-white">
                            TE</div>
                        <span class="text-lg font-bold text-gray-900">TrackEd</span>
                    </a>
                </div>

                <nav class="flex-1 overflow-y-auto px-4 pb-4">
                    @include('layouts.sidebar')
                </nav>

                <div class="border-t border-gray-100 p-4">
                    <div class="flex items-center justify-between gap-3">
                        <div class="min-w-0">
                            <div class="truncate text-sm font-semibold text-gray-900">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </div>
                            <div class="truncate text-xs text-gray-500">{{ Auth::user()->email }}</div>
                        </div>

                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    aria-label="User menu">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="px-4 py-2 text-xs text-gray-400 border-b border-gray-100">
                                    Role: <span class="uppercase font-bold">{{ Auth::user()->role }}</span>
                                </div>

                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile Settings') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="text-red-600 hover:bg-red-50">
                                        {{ __('Secure Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </aside>

            {{-- Mobile sidebar drawer --}}
            <div x-show="sidebarOpen" x-cloak class="relative z-50 lg:hidden" aria-modal="true" role="dialog">
                <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-gray-900/50"
                    @click="sidebarOpen = false"></div>

                <aside x-show="sidebarOpen" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="-translate-x-full" @keydown.escape.window="sidebarOpen = false"
                    class="fixed inset-y-0 left-0 flex w-80 max-w-[85vw] flex-col border-r border-gray-200 bg-white">

                    <div class="flex items-center justify-between gap-2 px-5 py-4 border-b border-gray-100">
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                            <div
                                class="flex h-9 w-9 items-center justify-center rounded bg-indigo-600 text-sm font-bold text-white">
                                TE</div>
                            <span class="text-lg font-bold text-gray-900">TrackEd</span>
                        </a>

                        <button type="button" @click="sidebarOpen = false" aria-label="Close navigation"
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <nav class="flex-1 overflow-y-auto px-4 py-4" @click="sidebarOpen = false">
                        @include('layouts.sidebar')
                    </nav>

                    <div class="border-t border-gray-100 p-4 bg-gray-50">
                        <div class="text-sm font-semibold text-gray-900">{{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}</div>
                        <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </aside>
            </div>

            {{-- Main content --}}
            <div class="min-w-0 flex-1">
                @isset($header)
                    <header class="border-b border-gray-200 bg-white">
                        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $slot }}
                </main>
            </div>
=======
<body class="font-sans antialiased"
    x-data="{
        sidebarOpen: false,
        focusSidebarStart() {
            const firstLink = this.$refs.sidebar?.querySelector('[data-focus-target]');
            if (firstLink) {
                firstLink.focus();
                return;
            }

            document.getElementById('sidebar-navigation-heading')?.focus();
        }
    }"
    @keydown.escape.window="sidebarOpen = false">
    <div class="min-h-screen bg-slate-50 lg:flex">
        <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-40 bg-slate-900/50 lg:hidden"
            @click="sidebarOpen = false" aria-hidden="true" x-cloak></div>

        <aside id="mobile-sidebar"
            class="fixed inset-y-0 left-0 z-50 w-72 border-r border-gray-200 bg-white shadow-lg transition-transform duration-200 lg:sticky lg:top-0 lg:h-screen lg:translate-x-0 lg:shadow-none"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" role="navigation" x-ref="sidebar"
            aria-label="Primary navigation">
            @include('layouts.navigation')
        </aside>

        <div class="flex min-h-screen flex-1 flex-col">
            <header class="sticky top-0 z-30 border-b border-gray-200 bg-white/95 backdrop-blur">
                <div class="flex h-16 items-center justify-between px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center gap-3">
                        <button type="button"
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 lg:hidden"
                            @click="sidebarOpen = true; $nextTick(() => focusSidebarStart())"
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
>>>>>>> copilot/update-ui-ux-responsive-layout
        </div>
    </div>
</body>

</html>
