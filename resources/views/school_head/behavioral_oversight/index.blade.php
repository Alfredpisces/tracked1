<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Institutional Behavioral Analytics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="flex justify-between items-center mb-4">
                <p class="text-sm text-gray-600">Tracking metrics for logged violations only (excludes general student
                    population & absenteeism).</p>
                <button
                    class="inline-flex items-center px-4 py-2 bg-indigo-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-800">
                    Export Behavioral PDF Report
                </button>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-2">Offense Severity (This
                        Quarter)</h3>
                    <div class="flex justify-between items-end mt-4">
                        <div>
                            <p class="text-3xl font-black text-red-600">8</p>
                            <p class="text-xs text-gray-500 mt-1">Major Offenses</p>
                        </div>
                        <div>
                            <p class="text-3xl font-black text-orange-400">14</p>
                            <p class="text-xs text-gray-500 mt-1">Minor Offenses</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-4">Most Frequent Infractions
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex justify-between text-sm">
                            <span class="text-gray-700">1. Vandalism</span>
                            <span class="font-bold text-gray-900">35%</span>
                        </li>
                        <li class="flex justify-between text-sm">
                            <span class="text-gray-700">2. Disruptive Behavior</span>
                            <span class="font-bold text-gray-900">28%</span>
                        </li>
                        <li class="flex justify-between text-sm">
                            <span class="text-gray-700">3. Bullying / Harassment</span>
                            <span class="font-bold text-gray-900">15%</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h3 class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-2">Guidance Resolution Rate
                    </h3>
                    <div class="mt-4">
                        <div class="flex items-center justify-between text-sm mb-1">
                            <span class="text-gray-600">Cases Resolved</span>
                            <span class="font-bold text-emerald-600">82%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-emerald-500 h-2.5 rounded-full" style="width: 82%"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-3">18% of cases are currently pending intervention.</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-l-4 border-red-500">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Escalated Cases (Principal Review Required)</h3>
                    <p class="text-sm text-gray-600 mb-4">These major infractions require your final sign-off for
                        suspension or parent conference.</p>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Student
                                        LRN</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Offense
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Counselor Recommendation</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-900">108234091234
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Physical Altercation
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 font-medium">3-Day
                                        Suspension</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button class="text-indigo-600 hover:text-indigo-900 font-bold">Sign-off /
                                            Review</button>
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
