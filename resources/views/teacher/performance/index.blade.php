<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('My Performance Metrics') }}
            </h2>
            <a href="#"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                + Add Professional Growth
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-blue-500">
                    <div class="p-6">
                        <p class="text-sm font-medium text-gray-500 truncate">DLL Compliance Rate</p>
                        <div class="mt-1 flex items-baseline">
                            <p class="text-3xl font-semibold text-gray-900">96%</p>
                            <p class="ml-2 text-sm text-green-600 font-medium">On Track</p>
                        </div>
                        <p class="mt-3 text-xs text-gray-500">Accounts for 40% of DSS Ranking</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-emerald-500">
                    <div class="p-6">
                        <p class="text-sm font-medium text-gray-500 truncate">Average COT Score</p>
                        <div class="mt-1 flex items-baseline">
                            <p class="text-3xl font-semibold text-gray-900">4.7</p>
                            <p class="ml-2 text-sm text-gray-500 font-medium">/ 5.0</p>
                        </div>
                        <p class="mt-3 text-xs text-gray-500">Accounts for 40% of DSS Ranking</p>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-purple-500">
                    <div class="p-6">
                        <p class="text-sm font-medium text-gray-500 truncate">Professional Growth</p>
                        <div class="mt-1 flex items-baseline">
                            <p class="text-3xl font-semibold text-gray-900">18</p>
                            <p class="ml-2 text-sm text-gray-500 font-medium">Points</p>
                        </div>
                        <p class="mt-3 text-xs text-gray-500">Accounts for 20% of DSS Ranking</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Uploaded Seminar Certificates</h3>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Seminar Title</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date Attended</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Points Earned</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Verification</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Regional
                                        ICT Summit 2026</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">March 02, 2026</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Verified</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">National
                                        Pedagogy Workshop</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">January 15, 2026</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">8</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Verified</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
