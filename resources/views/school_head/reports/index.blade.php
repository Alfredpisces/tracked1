<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Institutional Reports') }}</h2></x-slot>
    <div class="max-w-xl bg-white shadow-sm rounded-lg p-6">
        <form action="{{ route('school_head.reports.generate') }}" method="POST" class="space-y-4">
            @csrf
            <div><label for="report_type" class="block text-sm font-medium text-gray-700">Report Type</label><select id="report_type" name="report_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"><option value="academic">Academic</option><option value="behavioral">Behavioral</option><option value="inventory">Inventory</option></select></div>
            <button type="submit" class="inline-flex rounded-md bg-indigo-900 px-4 py-2 text-sm font-medium text-white">Generate Report</button>
        </form>
    </div>
</x-app-layout>
