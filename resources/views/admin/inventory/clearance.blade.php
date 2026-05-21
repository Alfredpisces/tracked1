<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Process Personnel Clearance') }}</h2></x-slot>
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50"><tr><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Personnel</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Liabilities</th></tr></thead>
            <tbody class="divide-y divide-gray-200 bg-white">@forelse($personnel as $user)<tr><td class="px-6 py-4 text-sm text-gray-900">{{ $user->name }}</td><td class="px-6 py-4 text-sm text-gray-600">{{ $user->assetAssignments->filter(fn($assignment) => !$assignment->released_at && in_array($assignment->asset->condition_status, ['damaged', 'lost'], true))->map(fn($assignment) => $assignment->asset->name.' ('.$assignment->asset->serial_number.')')->implode(', ') }}</td></tr>@empty<tr><td colspan="2" class="px-6 py-6 text-sm text-gray-500">No blocked clearances.</td></tr>@endforelse</tbody>
        </table>
    </div>
</x-app-layout>
