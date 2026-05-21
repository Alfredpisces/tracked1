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
