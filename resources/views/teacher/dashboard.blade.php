<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teacher Workspace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 border-l-4 border-indigo-500 bg-indigo-50">
                    <h3 class="text-lg font-bold text-indigo-900">Welcome back, {{ Auth::user()->first_name }}!</h3>
                    <p class="text-sm text-indigo-700 mt-1">Select a module below to manage your academic submissions,
                        classroom assets, or student reports.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-lg font-bold text-gray-800">Daily Lesson Logs</h4>
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Academic</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-6">Draft your lesson plans offline and use the AI Pre-checker
                            for completeness validation.</p>
                        <a href="{{ route('dll.create') }}"
                            class="w-full inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Create New DLL
                        </a>
                    </div>
                </div>

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-lg font-bold text-gray-800">My Assets (E-PAR)</h4>
                            <span
                                class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Inventory</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-6">Acknowledge assigned hardware like laptops and check your
                            year-end clearance status.</p>
                        <a href="#"
                            class="w-full inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            View Assigned Properties
                        </a>
                    </div>
                </div>

                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="text-lg font-bold text-gray-800">Incident Reports</h4>
                            <span
                                class="bg-red-100 text-red-800 text-xs font-semibold px-2.5 py-0.5 rounded">Discipline</span>
                        </div>
                        <p class="text-sm text-gray-600 mb-6">Log behavioral violations for students to alert the
                            Guidance Office for intervention.</p>
                        <a href="#"
                            class="w-full inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Report an Incident
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
