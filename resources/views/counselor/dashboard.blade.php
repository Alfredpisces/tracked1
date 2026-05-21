<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Guidance Counselor Workspace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 border-l-4 border-amber-500 bg-amber-50">
                    <h3 class="text-lg font-bold text-amber-900">Behavioral Tracking Hub</h3>
                    <p class="text-sm text-amber-700 mt-1">Review teacher incident reports, manage student intervention
                        cases, and process automated Good Moral certificates.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-lg font-bold text-gray-800">Pending Incidents</h4>
                                <span class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Action
                                    Required</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-6">Review new behavioral infractions submitted by the
                                teaching staff and initiate counseling interventions.</p>
                        </div>
                        <a href="#"
                            class="w-full inline-flex justify-center rounded-md border border-transparent bg-amber-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 mt-auto">
                            Review Reports
                        </a>
                    </div>
                </div>

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-lg font-bold text-gray-800">Violator Records</h4>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Database</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-6">Access the localized masterlist of students with
                                active or resolved disciplinary cases.</p>
                        </div>
                        <a href="#"
                            class="w-full inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 mt-auto">
                            Search Records
                        </a>
                    </div>
                </div>

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                    <div class="p-6 flex flex-col h-full">
                        <div class="flex-grow">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-lg font-bold text-gray-800">Good Moral Certs</h4>
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Clearance</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-6">Generate automated PDF certificates. The system will
                                automatically block generation for students with unresolved major offenses.</p>
                        </div>
                        <a href="#"
                            class="w-full inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 mt-auto">
                            Issue Certificate
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
