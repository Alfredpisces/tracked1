<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit / Revise Daily Lesson Log') }}</h2></x-slot>
    @include('teacher.dll.partials.form', ['dailyLessonLog' => $dailyLessonLog, 'draftKey' => $draftKey])
</x-app-layout>
