<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Administrator Workspace') }}</h2></x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <a href="{{ route('admin.personnel.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Manage Personnel</h3><p class="mt-2 text-sm text-gray-600">Provision accounts and assign PBAC permissions.</p></a>
        <a href="{{ route('admin.lis_sync.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">LIS Sync</h3><p class="mt-2 text-sm text-gray-600">Upload masterlists and upsert student records.</p></a>
        <a href="{{ route('admin.inventory.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Inventory</h3><p class="mt-2 text-sm text-gray-600">Assign assets and track E-PAR / ICS accountability.</p></a>
        <a href="{{ route('admin.clearances.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Clearances</h3><p class="mt-2 text-sm text-gray-600">Monitor blocked clearances from unresolved assets.</p></a>
    </div>
</x-app-layout>
