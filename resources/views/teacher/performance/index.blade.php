<x-app-layout>
    <x-slot name="header"><div class="flex justify-between items-center"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('My Performance Metrics') }}</h2><a href="{{ route('teacher.performance.create_seminar') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 rounded-md text-xs font-semibold text-white uppercase">+ Add Professional Growth</a></div></x-slot>
    <div class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow-sm rounded-lg p-6"><p class="text-sm text-gray-500">DLL Compliance Rate</p><p class="text-3xl font-semibold text-gray-900">{{ $stats['dll_compliance_rate'] }}%</p></div>
            <div class="bg-white shadow-sm rounded-lg p-6"><p class="text-sm text-gray-500">Average COT Score</p><p class="text-3xl font-semibold text-gray-900">{{ number_format($stats['average_cot_score'], 2) }}</p></div>
            <div class="bg-white shadow-sm rounded-lg p-6"><p class="text-sm text-gray-500">Professional Growth Points</p><p class="text-3xl font-semibold text-gray-900">{{ number_format($stats['professional_growth_points'], 2) }}</p></div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white shadow-sm rounded-lg p-6"><h3 class="font-bold text-gray-900 mb-4">COT Ratings</h3><ul class="space-y-3">@forelse($cotRatings as $rating)<li class="text-sm text-gray-700">{{ $rating->rating_date?->format('M d, Y') }} — {{ number_format((float) $rating->score, 2) }} / 5.00</li>@empty<li class="text-sm text-gray-500">No COT ratings available yet.</li>@endforelse</ul></div>
            <div class="bg-white shadow-sm rounded-lg p-6"><h3 class="font-bold text-gray-900 mb-4">Professional Growth Entries</h3><ul class="space-y-3">@forelse($growthEntries as $entry)<li class="text-sm text-gray-700">{{ $entry->title }} — {{ number_format((float) $entry->points, 2) }} pts ({{ ucfirst($entry->verification_status) }})</li>@empty<li class="text-sm text-gray-500">No professional growth records submitted yet.</li>@endforelse</ul></div>
        </div>
    </div>
</x-app-layout>
