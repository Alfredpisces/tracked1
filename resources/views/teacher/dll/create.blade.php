<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('System-Based DLL Builder') }}</h2></x-slot>
    @include('teacher.dll.partials.form', ['dailyLessonLog' => null, 'draftKey' => $draftKey])
</x-app-layout>
