<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('My Daily Lesson Logs') }}</h2>
            <a href="{{ route('teacher.dll.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 rounded-md text-xs font-semibold text-white uppercase">+ Create New DLL</a>
        </div>
    </x-slot>
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50"><tr><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Target Date</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subject</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">AI Checked</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th><th class="px-6 py-3"></th></tr></thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @forelse ($dailyLessonLogs as $dailyLessonLog)
                <tr>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $dailyLessonLog->target_date?->format('M d, Y') }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">{{ $dailyLessonLog->subject }}</td>
                    <td class="px-6 py-4 text-sm">{{ $dailyLessonLog->is_ai_passed ? 'Passed' : 'Needs Review' }}</td>
                    <td class="px-6 py-4 text-sm capitalize">{{ str_replace('_', ' ', $dailyLessonLog->status) }}</td>
                    <td class="px-6 py-4 text-sm space-x-3"><a href="{{ route('teacher.dll.show', $dailyLessonLog) }}" class="text-indigo-600">View</a><a href="{{ route('teacher.dll.edit', $dailyLessonLog) }}" class="text-indigo-600">Edit</a></td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-6 py-6 text-sm text-gray-500">No DLL records yet.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
