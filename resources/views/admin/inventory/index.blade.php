<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Master Property Ledger') }}</h2></x-slot>
    <div class="space-y-6">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h3 class="font-bold text-gray-900 mb-4">Assign Hardware Asset</h3>
            <form action="{{ route('admin.inventory.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                @csrf
                <input type="text" name="name" placeholder="Item Name" class="rounded-md border-gray-300 shadow-sm" required>
                <input type="text" name="serial_number" placeholder="Serial Number" class="rounded-md border-gray-300 shadow-sm" required>
                <select name="asset_type" class="rounded-md border-gray-300 shadow-sm"><option value="epar">E-PAR</option><option value="ics">ICS</option></select>
                <select name="user_id" class="rounded-md border-gray-300 shadow-sm" required>@foreach($teachers as $teacher)<option value="{{ $teacher->id }}">{{ $teacher->name }} ({{ $teacher->employee_id }})</option>@endforeach</select>
                <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Assign Asset</button>
            </form>
        </div>
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50"><tr><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Asset</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Assigned To</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Condition</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th></tr></thead>
                <tbody class="divide-y divide-gray-200 bg-white">@forelse($assets as $asset)<tr><td class="px-6 py-4 text-sm text-gray-900">{{ $asset->name }}<div class="text-xs text-gray-500">{{ $asset->serial_number }}</div></td><td class="px-6 py-4 text-sm text-gray-600">{{ $asset->currentAssignment?->user?->name ?? 'Unassigned' }}</td><td class="px-6 py-4 text-sm capitalize">{{ $asset->condition_status }}</td><td class="px-6 py-4 text-sm uppercase">{{ $asset->asset_type }}</td></tr>@empty<tr><td colspan="4" class="px-6 py-6 text-sm text-gray-500">No assets found.</td></tr>@endforelse</tbody>
            </table>
        </div>
    </div>
</x-app-layout>
