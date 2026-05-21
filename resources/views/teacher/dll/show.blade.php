<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Daily Lesson Log Details') }}</h2></x-slot>
    <div class="bg-white shadow-sm rounded-lg p-6 space-y-4">
        <div class="flex items-center justify-between"><h3 class="text-lg font-bold text-gray-900">{{ $dailyLessonLog->subject }}</h3><span class="text-sm capitalize">{{ $dailyLessonLog->status }}</span></div>
        <p class="text-sm text-gray-500">Target date: {{ $dailyLessonLog->target_date?->format('M d, Y') }}</p>
        <div><h4 class="font-semibold">Objectives</h4><p class="text-sm text-gray-700 whitespace-pre-line">{{ $dailyLessonLog->objectives }}</p></div>
        <div><h4 class="font-semibold">Content</h4><p class="text-sm text-gray-700 whitespace-pre-line">{{ $dailyLessonLog->content }}</p></div>
        <div><h4 class="font-semibold">Learning Resources</h4><p class="text-sm text-gray-700 whitespace-pre-line">{{ $dailyLessonLog->learning_resources }}</p></div>
        <div><h4 class="font-semibold">Procedures</h4><p class="text-sm text-gray-700 whitespace-pre-line">{{ $dailyLessonLog->procedures }}</p></div>
        <div><h4 class="font-semibold">Reflection</h4><p class="text-sm text-gray-700 whitespace-pre-line">{{ $dailyLessonLog->reflection }}</p></div>
    </div>
</x-app-layout>
