<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Guidance Counselor Workspace') }}</h2></x-slot>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="{{ route('counselor.incidents.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Incident Review</h3><p class="mt-2 text-sm text-gray-600">Review teacher incident submissions and log interventions.</p></a>
        <a href="{{ route('counselor.violators.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Violator Records</h3><p class="mt-2 text-sm text-gray-600">Search student behavior histories and certificate status.</p></a>
        <a href="{{ route('counselor.good_moral.index') }}" class="rounded-lg bg-white p-6 shadow-sm border"><h3 class="font-bold text-gray-900">Good Moral</h3><p class="mt-2 text-sm text-gray-600">Generate certificates only for eligible learners.</p></a>
    </div>
</x-app-layout>
