<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Issue Good Moral Certificate') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Student Clearance Check</h3>
                    <form action="#" class="flex gap-4 items-end">
                        <div class="flex-grow">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Enter Student LRN (12
                                Digits)</label>
                            <input type="text" pattern="\d{12}" maxlength="12"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="e.g., 108123456789">
                        </div>
                        <button type="button"
                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-6 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Check Status
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded-r-lg shadow-sm">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-green-800">Clearance Status: Passed</h3>
                        <p class="mt-2 text-sm text-green-700">
                            LRN <strong>108999888777</strong> has no unresolved major infractions in the behavioral
                            tracking database. They are cleared to receive a Certificate of Good Moral Character.
                        </p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="button"
                        class="inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-6 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Download Certificate (PDF)
                    </button>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
