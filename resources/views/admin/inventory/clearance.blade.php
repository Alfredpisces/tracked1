<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Process Personnel Clearance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Personnel to Audit</label>
                    <div class="flex gap-4">
                        <select
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option selected>Juan Dela Cruz (EMP-1001)</option>
                        </select>
                        <button
                            class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-6 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                            Run Audit
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-r-lg shadow-sm">
                <h3 class="text-lg font-medium text-red-800">Clearance Blocked</h3>
                <p class="mt-2 text-sm text-red-700 mb-4">
                    The system detected unresolved physical assets for this personnel. You cannot generate a final
                    property clearance until these items are liquidated.
                </p>

                <div class="bg-white p-4 rounded border border-red-200">
                    <h4 class="text-sm font-bold text-gray-800 mb-2">Pending Liabilities:</h4>
                    <ul class="text-sm text-gray-600 list-disc list-inside">
                        <li>Smart TV 55" (STV-2023-00811) - <span class="text-red-600 font-semibold">Reported
                                Damaged</span></li>
                    </ul>
                </div>

                <div class="mt-4 flex gap-3">
                    <button
                        class="px-4 py-2 bg-white border border-gray-300 rounded text-sm text-gray-700 hover:bg-gray-50">Override
                        & Resolve Item</button>
                    <button disabled
                        class="px-4 py-2 bg-gray-400 border border-transparent rounded text-sm text-white cursor-not-allowed">Generate
                        Clearance PDF</button>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
