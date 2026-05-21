<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Principal / School Head Command Center') }}</h2></x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
        <a href="{{ route('school_head.dll.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">DLL Review</h3><p class="mt-2 text-sm text-gray-600">Approve or return DLL submissions for revision.</p></a>
        <a href="{{ route('school_head.dss.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">DSS Analytics</h3><p class="mt-2 text-sm text-gray-600">Review teacher rankings and performance metrics.</p></a>
        <a href="{{ route('school_head.behavior.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Behavioral Oversight</h3><p class="mt-2 text-sm text-gray-600">Monitor major incidents and counselor resolution trends.</p></a>
        <a href="{{ route('school_head.inventory.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Inventory Oversight</h3><p class="mt-2 text-sm text-gray-600">Track unresolved assets and blocked clearances.</p></a>
    </div>
    <div class="mt-6">
        <a href="{{ route('school_head.reports.index') }}" class="inline-flex items-center rounded-md bg-indigo-900 px-4 py-2 text-sm font-medium text-white">Open Report Generator</a>
    </div>
</x-app-layout>
