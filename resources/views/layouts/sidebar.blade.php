@php
    /**
     * Sidebar navigation
     *
     * Notes:
     * - Use <a> tags for a modern sidebar look (more compact than Breeze's top nav).
 * - Keep route names intact.
 */

$isActive = fn(string $pattern) => request()->routeIs($pattern);

$linkBase = 'group flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium transition';
$active = 'bg-indigo-50 text-indigo-700 ring-1 ring-indigo-100';
$inactive = 'text-gray-700 hover:bg-gray-50 hover:text-gray-900';

$iconBase = 'h-5 w-5 shrink-0';
@endphp

<div class="space-y-1">
    <a href="{{ route('dashboard') }}" class="{{ $linkBase }} {{ $isActive('dashboard') ? $active : $inactive }}">
        <svg class="{{ $iconBase }} {{ $isActive('dashboard') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.75 12l8.25-8.25L20.25 12v8.25A2.25 2.25 0 0118 22.5h-3.75v-6.75H9.75v6.75H6A2.25 2.25 0 013.75 20.25V12z" />
        </svg>
        <span>Dashboard</span>
    </a>
</div>

@if (Auth::user()->role === 'admin')
    <div class="mt-6">
        <div class="px-3 text-xs font-semibold uppercase tracking-wider text-gray-400">Admin</div>
        <div class="mt-2 space-y-1">
            <a href="{{ route('admin.personnel.index') }}"
                class="{{ $linkBase }} {{ $isActive('admin.personnel.*') ? $active : $inactive }}">
                <svg class="{{ $iconBase }} {{ $isActive('admin.personnel.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
                <span>Personnel</span>
            </a>

            <a href="{{ route('admin.lis_sync.index') }}"
                class="{{ $linkBase }} {{ $isActive('admin.lis_sync.*') ? $active : $inactive }}">
                <svg class="{{ $iconBase }} {{ $isActive('admin.lis_sync.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5A2.25 2.25 0 014.5 17.25v-9A2.25 2.25 0 016.75 6h10.5A2.25 2.25 0 0119.5 8.25v9a2.25 2.25 0 01-2.25 2.25H6.75z" />
                </svg>
                <span>LIS Sync</span>
            </a>

            <a href="{{ route('admin.inventory.index') }}"
                class="{{ $linkBase }} {{ $isActive('admin.inventory.*') ? $active : $inactive }}">
                <svg class="{{ $iconBase }} {{ $isActive('admin.inventory.*') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7.5l9 4.5 9-4.5M3 7.5l9-4.5 9 4.5M3 7.5v9l9 4.5 9-4.5v-9M12 12v9" />
                </svg>
                <span>Master Inventory</span>
            </a>
        </div>
    </div>
@endif

<div class="mt-6">
    <div class="px-3 text-xs font-semibold uppercase tracking-wider text-gray-400">Account</div>
    <div class="mt-2 space-y-1">
        <a href="{{ route('profile.edit') }}"
            class="{{ $linkBase }} {{ $isActive('profile.edit') ? $active : $inactive }}">
            <svg class="{{ $iconBase }} {{ $isActive('profile.edit') ? 'text-indigo-600' : 'text-gray-400 group-hover:text-gray-500' }}"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.5-1.632z" />
            </svg>
            <span>Profile Settings</span>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="{{ $linkBase }} w-full text-left text-red-700 hover:bg-red-50">
                <svg class="{{ $iconBase }} text-red-400 group-hover:text-red-500"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l-3-3m0 0l3-3m-3 3H9" />
                </svg>
                <span>Secure Log Out</span>
            </button>
        </form>
    </div>
</div>
