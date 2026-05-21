<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Issue Good Moral Certificate') }}</h2></x-slot>
    <div class="space-y-6">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <form action="{{ route('counselor.good_moral.index') }}" method="GET" class="flex gap-4 items-end">
                <div class="flex-grow"><label class="block text-sm font-medium text-gray-700 mb-1">Enter Student LRN</label><input type="text" name="student_lrn" value="{{ request('student_lrn') }}" pattern="\d{12}" maxlength="12" class="block w-full rounded-md border-gray-300 shadow-sm" placeholder="108123456789"></div>
                <button type="submit" class="inline-flex rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Check Status</button>
            </form>
        </div>
        @if ($student)
            <div class="rounded-lg p-6 {{ $student->isEligibleForGoodMoral() ? 'bg-green-50 border border-green-200 text-green-800' : 'bg-red-50 border border-red-200 text-red-800' }}">
                <h3 class="text-lg font-medium">{{ $student->isEligibleForGoodMoral() ? 'Clearance Status: Passed' : 'Clearance Status: Blocked' }}</h3>
                <p class="mt-2 text-sm">{{ $student->isEligibleForGoodMoral() ? 'Student has no unresolved major infractions and is eligible for a Good Moral certificate.' : 'Student has unresolved major infractions and cannot receive a Good Moral certificate yet.' }}</p>
                @if ($student->isEligibleForGoodMoral())
                    <form action="{{ route('counselor.good_moral.generate') }}" method="POST" class="mt-4">@csrf<input type="hidden" name="student_lrn" value="{{ $student->lrn }}"><button type="submit" class="inline-flex rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white">Download Certificate</button></form>
                @endif
            </div>
        @endif
    </div>
</x-app-layout>
