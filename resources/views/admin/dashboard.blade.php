<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrator Workspace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 border-l-4 border-indigo-600 bg-indigo-50">
                    <h3 class="text-lg font-bold text-indigo-900">System Administration Hub</h3>
                    <p class="text-sm text-indigo-700 mt-1">Manage personnel access, synchronize the student masterlist,
                        and oversee government property accountability.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-lg font-bold text-gray-800">Manage Personnel</h4>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">PBAC</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-6">Provision lightweight accounts and assign granular
                                system permissions to faculty and staff.</p>
                        </div>
                        <a href="#"
                            class="w-full inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-auto">
                            User Directory
                        </a>
                    </div>
                </div>

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-lg font-bold text-gray-800">LIS Data Sync</h4>
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Database</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-6">Upload DepEd LIS Excel files to automatically update
                                the student tracking masterlist.</p>
                        </div>
                        <a href="#"
                            class="w-full inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-auto">
                            Run Synchronization
                        </a>
                    </div>
                </div>

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-lg font-bold text-gray-800">Property Ledger</h4>
                                <span
                                    class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Assets</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-6">Assign hardware, generate E-PAR/ICS receipts, and
                                track asset conditions across the school.</p>
                        </div>
                        <a href="#"
                            class="w-full inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-auto">
                            View Asset Ledger
                        </a>
                    </div>
                </div>

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-lg font-bold text-gray-800">Property Clearance</h4>
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Audit</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-6">Process automated year-end clearances for transferring
                                or retiring personnel.</p>
                        </div>
                        <a href="#"
                            class="w-full inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mt-auto">
                            Process Clearances
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
