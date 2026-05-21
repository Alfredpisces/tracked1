<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Year-End Property Clearance') }}</h2></x-slot>
    <div class="space-y-6">
        <div class="rounded-lg p-6 {{ $unresolvedAssignments->isEmpty() ? 'bg-green-50 border border-green-200 text-green-800' : 'bg-red-50 border border-red-200 text-red-800' }}">
            <h3 class="text-lg font-medium">{{ $unresolvedAssignments->isEmpty() ? 'Clearance Status: Ready' : 'Clearance Status: Blocked' }}</h3>
            <p class="mt-2 text-sm">{{ $unresolvedAssignments->isEmpty() ? 'No unresolved asset liabilities were found.' : 'You have unresolved damaged or lost assets that block your clearance certificate.' }}</p>
        </div>
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h3 class="font-bold text-gray-900 mb-4">Unresolved Assets</h3>
            <ul class="space-y-3">@forelse($unresolvedAssignments as $assignment)<li class="text-sm text-gray-700">{{ $assignment->asset->name }} ({{ $assignment->asset->serial_number }}) — {{ ucfirst($assignment->asset->condition_status) }}</li>@empty<li class="text-sm text-gray-500">No unresolved assets.</li>@endforelse</ul>
        </div>
    </div>
</x-app-layout>
