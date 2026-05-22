<<<<<<< HEAD
@php($user = Auth::user())
<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-6">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-indigo-600 text-white rounded flex items-center justify-center font-bold text-sm">{{ $user->initials() }}</div>
                    <span class="font-bold text-gray-800 text-lg hidden sm:block">TrackEd</span>
                </a>
                <div class="hidden sm:flex sm:items-center gap-4 text-sm">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600">Dashboard</a>
                    @if ($user->role === 'admin')
                        <a href="{{ route('admin.personnel.index') }}" class="text-gray-700 hover:text-indigo-600">Personnel</a>
                        <a href="{{ route('admin.lis_sync.index') }}" class="text-gray-700 hover:text-indigo-600">LIS Sync</a>
                        <a href="{{ route('admin.inventory.index') }}" class="text-gray-700 hover:text-indigo-600">Inventory</a>
                    @elseif ($user->role === 'teacher')
                        <a href="{{ route('teacher.dll.index') }}" class="text-gray-700 hover:text-indigo-600">DLL</a>
                        <a href="{{ route('teacher.performance.index') }}" class="text-gray-700 hover:text-indigo-600">Performance</a>
                        <a href="{{ route('teacher.incidents.index') }}" class="text-gray-700 hover:text-indigo-600">Incidents</a>
                        <a href="{{ route('teacher.inventory.index') }}" class="text-gray-700 hover:text-indigo-600">Inventory</a>
                    @elseif ($user->role === 'counselor')
                        <a href="{{ route('counselor.incidents.index') }}" class="text-gray-700 hover:text-indigo-600">Incident Review</a>
                        <a href="{{ route('counselor.violators.index') }}" class="text-gray-700 hover:text-indigo-600">Violators</a>
                        <a href="{{ route('counselor.good_moral.index') }}" class="text-gray-700 hover:text-indigo-600">Good Moral</a>
                    @elseif ($user->role === 'school_head')
                        <a href="{{ route('school_head.dll.index') }}" class="text-gray-700 hover:text-indigo-600">DLL Review</a>
                        <a href="{{ route('school_head.dss.index') }}" class="text-gray-700 hover:text-indigo-600">DSS</a>
                        <a href="{{ route('school_head.behavior.index') }}" class="text-gray-700 hover:text-indigo-600">Behavior</a>
                        <a href="{{ route('school_head.inventory.index') }}" class="text-gray-700 hover:text-indigo-600">Inventory</a>
                    @endif
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md text-gray-700 bg-white hover:text-indigo-600">
                            <div>{{ $user->name }}</div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <div class="px-4 py-2 text-xs text-gray-400 border-b border-gray-100">Role: <span class="uppercase font-bold">{{ $user->role }}</span></div>
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile Settings') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();" class="text-red-600 hover:bg-red-50">{{ __('Secure Log Out') }}</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
=======
<nav class="flex h-full flex-col">
    <h2 id="sidebar-navigation-heading" class="sr-only" tabindex="-1">Primary navigation menu</h2>
    <div class="flex h-16 shrink-0 items-center border-b border-gray-200 px-5">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <div class="flex h-9 w-9 items-center justify-center rounded-md bg-indigo-600 text-sm font-bold text-white">
                TE</div>
            <div>
                <p class="text-sm font-bold text-gray-900">TrackEd</p>
                <p class="text-xs text-gray-500">Management Suite</p>
            </div>
        </a>
    </div>

    <div class="flex-1 overflow-y-auto px-3 py-4">
        <div class="space-y-1">
            <a href="{{ route('dashboard') }}"
                data-focus-target
                class="{{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700 ring-1 ring-indigo-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} flex items-center rounded-lg px-3 py-2 text-sm font-medium transition">
                {{ __('Dashboard') }}
            </a>

            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.personnel.index') }}"
                    class="{{ request()->routeIs('admin.personnel.*') ? 'bg-indigo-50 text-indigo-700 ring-1 ring-indigo-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} flex items-center rounded-lg px-3 py-2 text-sm font-medium transition">
                    {{ __('Personnel') }}
                </a>
                <a href="{{ route('admin.lis_sync.index') }}"
                    class="{{ request()->routeIs('admin.lis_sync.*') ? 'bg-indigo-50 text-indigo-700 ring-1 ring-indigo-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} flex items-center rounded-lg px-3 py-2 text-sm font-medium transition">
                    {{ __('LIS Sync') }}
                </a>
                <a href="{{ route('admin.inventory.index') }}"
                    class="{{ request()->routeIs('admin.inventory.*') ? 'bg-indigo-50 text-indigo-700 ring-1 ring-indigo-100' : 'text-gray-700 hover:bg-gray-100 hover:text-gray-900' }} flex items-center rounded-lg px-3 py-2 text-sm font-medium transition">
                    {{ __('Master Inventory') }}
                </a>
            @endif
        </div>
    </div>

    <div class="space-y-2 border-t border-gray-200 bg-gray-50 p-4">
        <div>
            <p class="truncate text-sm font-semibold text-gray-800">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
            <p class="truncate text-xs text-gray-500">{{ Auth::user()->email }}</p>
>>>>>>> copilot/update-ui-ux-responsive-layout
        </div>

        <a href="{{ route('profile.edit') }}"
            class="flex items-center rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-white hover:text-gray-900">
            {{ __('Profile Settings') }}
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex w-full items-center rounded-lg px-3 py-2 text-left text-sm font-medium text-red-600 transition hover:bg-red-50">
                {{ __('Secure Log Out') }}
            </button>
        </form>
    </div>
</nav>
