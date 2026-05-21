<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('LIS Data Synchronization') }}</h2></x-slot>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white shadow-sm rounded-lg p-6">
            <form action="{{ route('admin.lis_sync.process') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div><label for="lis_file" class="block text-sm font-medium text-gray-700">LIS Data File</label><input type="file" name="lis_file" id="lis_file" accept=".xlsx,.xls,.csv" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></div>
                <button type="submit" class="inline-flex rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Run LIS Sync</button>
            </form>
        </div>
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h3 class="font-bold text-gray-900 mb-4">Last Sync Summary</h3>
            <p class="text-sm text-gray-600 mb-2">Last run: {{ optional($summary['last_run'] ?? null)?->format('M d, Y H:i') ?? 'Not yet synced' }}</p>
            <ul class="space-y-2 text-sm text-gray-700"><li>Inserted: {{ $summary['inserted'] ?? 0 }}</li><li>Updated: {{ $summary['updated'] ?? 0 }}</li><li>Skipped: {{ $summary['skipped'] ?? 0 }}</li></ul>
        </div>
    </div>
</x-app-layout>
