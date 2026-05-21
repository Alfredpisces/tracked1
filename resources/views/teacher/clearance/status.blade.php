<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Year-End Property Clearance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-red-50 border-l-4 border-red-500 p-6 mb-6 rounded-r-lg shadow-sm">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-red-800">Clearance Status: Blocked</h3>
                        <p class="mt-2 text-sm text-red-700">
                            Your year-end property clearance cannot be generated because you have <strong>1 unresolved
                                item(s)</strong> tagged as lost or damaged. You must settle this accountability with the
                            Administrative Officer.
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Unliquidated Assets</h3>

                    <ul class="divide-y divide-gray-200">
                        <li class="py-4 flex justify-between items-center">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Smart TV 55" (STV-2023-00811)</p>
                                <p class="text-sm text-gray-500">Reported Damaged: March 15, 2026</p>
                            </div>
                            <div>
                                <span
                                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Unresolved
                                    Liability</span>
                            </div>
                        </li>
                    </ul>

                    <div class="mt-6 p-4 bg-gray-50 rounded-md">
                        <h4 class="text-sm font-bold text-gray-700">Required Action:</h4>
                        <p class="text-sm text-gray-600 mt-1">Visit the Property Custodian to mark this asset as
                            <em>Replaced</em>, <em>Paid</em>, or to submit documentation for <em>Relief from
                                Accountability</em>. Once the ledger is updated, your clearance certificate will
                            automatically generate.</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="button" disabled
                    class="inline-flex justify-center rounded-md border border-transparent bg-gray-400 py-2 px-4 text-sm font-medium text-white shadow-sm cursor-not-allowed">
                    Download Clearance Certificate (PDF)
                </button>
            </div>

        </div>
    </div>
</x-app-layout>
