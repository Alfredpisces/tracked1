<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('My Assigned Properties (E-PAR & ICS)') }}</h2></x-slot>
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50"><tr><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Item</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Serial Number</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Condition</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th></tr></thead>
            <tbody class="divide-y divide-gray-200 bg-white">@forelse($assignments as $assignment)<tr><td class="px-6 py-4 text-sm text-gray-900">{{ $assignment->asset->name }}</td><td class="px-6 py-4 text-sm text-gray-500">{{ $assignment->asset->serial_number }}</td><td class="px-6 py-4 text-sm uppercase">{{ $assignment->asset->asset_type }}</td><td class="px-6 py-4 text-sm capitalize">{{ $assignment->asset->condition_status }}</td><td class="px-6 py-4 text-sm capitalize">{{ str_replace('_', ' ', $assignment->assignment_status) }}</td></tr>@empty<tr><td colspan="5" class="px-6 py-6 text-sm text-gray-500">No assigned properties found.</td></tr>@endforelse</tbody>
        </table>
    </div>
</x-app-layout>
