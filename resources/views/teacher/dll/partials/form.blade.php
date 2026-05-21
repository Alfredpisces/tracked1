@php($isEditing = filled($dailyLessonLog))
<div class="py-4">
    <div class="max-w-4xl mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <div id="network-status" class="hidden mb-4 p-3 rounded bg-yellow-100 text-yellow-800 text-sm font-medium">You are offline. DLL changes will be queued for sync.</div>
            <form id="dll-form" action="{{ $isEditing ? route('teacher.dll.update', $dailyLessonLog) : route('teacher.dll.store') }}" method="POST" class="space-y-6" data-draft-key="{{ $draftKey }}" data-precheck-route="{{ route('teacher.dll.precheck') }}" data-clear-draft-key="{{ session('dll_saved') }}">
                @csrf
                @if ($isEditing)
                    @method('PUT')
                    <input type="hidden" name="last_known_server_updated_at" value="{{ optional($dailyLessonLog->updated_at)->toISOString() }}">
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div><label for="subject" class="block text-sm font-medium text-gray-700">Subject</label><input type="text" name="subject" id="subject" value="{{ old('subject', $dailyLessonLog->subject ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></div>
                    <div><label for="target_date" class="block text-sm font-medium text-gray-700">Date</label><input type="date" name="target_date" id="target_date" value="{{ old('target_date', optional($dailyLessonLog->target_date ?? null)->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required></div>
                </div>
                <div><label for="objectives" class="block text-sm font-medium text-gray-700">Objectives</label><textarea name="objectives" id="objectives" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('objectives', $dailyLessonLog->objectives ?? '') }}</textarea></div>
                <div><label for="content" class="block text-sm font-medium text-gray-700">Content</label><textarea name="content" id="content" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('content', $dailyLessonLog->content ?? '') }}</textarea></div>
                <div><label for="learning_resources" class="block text-sm font-medium text-gray-700">Learning Resources</label><textarea name="learning_resources" id="learning_resources" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('learning_resources', $dailyLessonLog->learning_resources ?? '') }}</textarea></div>
                <div><label for="procedures" class="block text-sm font-medium text-gray-700">Procedures</label><textarea name="procedures" id="procedures" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('procedures', $dailyLessonLog->procedures ?? '') }}</textarea></div>
                <div><label for="reflection" class="block text-sm font-medium text-gray-700">Reflection</label><textarea name="reflection" id="reflection" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('reflection', $dailyLessonLog->reflection ?? '') }}</textarea></div>
                <div class="rounded-md border border-indigo-100 bg-indigo-50 px-4 py-3 text-sm text-indigo-800" id="ai-precheck-result">Run the AI pre-check before submitting for review.</div>
                <div class="flex flex-wrap items-center gap-4 pt-4 border-t border-gray-200">
                    <button type="submit" name="action" value="draft" class="inline-flex justify-center rounded-md bg-gray-800 py-2 px-4 text-sm font-medium text-white">💾 Save Draft</button>
                    <button type="submit" name="action" value="submit" class="inline-flex justify-center rounded-md bg-emerald-600 py-2 px-4 text-sm font-medium text-white">📨 Save & Submit</button>
                    <button type="button" id="ai-precheck-btn" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-4 text-sm font-medium text-white">🪄 Run AI Pre-Check</button>
                    <span id="save-status" class="text-sm text-gray-500 italic ml-auto"></span>
                </div>
            </form>
        </div>
    </div>
</div>
