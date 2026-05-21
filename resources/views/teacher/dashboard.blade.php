<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Teacher Workspace') }}</h2></x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <a href="{{ route('teacher.dll.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Daily Lesson Logs</h3><p class="mt-2 text-sm text-gray-600">Create, revise, and submit DLLs with offline drafting support.</p></a>
        <a href="{{ route('teacher.performance.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Performance</h3><p class="mt-2 text-sm text-gray-600">Track COT scores and professional growth submissions.</p></a>
        <a href="{{ route('teacher.incidents.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Incident Reports</h3><p class="mt-2 text-sm text-gray-600">Log learner incidents for counselor intervention.</p></a>
        <a href="{{ route('teacher.inventory.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Inventory & Clearance</h3><p class="mt-2 text-sm text-gray-600">Review asset accountability and year-end clearance status.</p></a>
    </div>
</x-app-layout>
