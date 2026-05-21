<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Principal / School Head Command Center') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-emerald-500">
                    <p class="text-sm font-medium text-gray-500">DLL Compliance (School-wide)</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">94%</p>
                    <p class="text-xs text-emerald-600 mt-1">↑ 2% from last week</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-amber-500">
                    <p class="text-sm font-medium text-gray-500">Active Disciplinary Cases</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">12</p>
                    <p class="text-xs text-amber-600 mt-1">Pending counselor resolution</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-blue-500">
                    <p class="text-sm font-medium text-gray-500">Damaged / Unresolved Assets</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">5</p>
                    <p class="text-xs text-blue-600 mt-1">Requires condemnation review</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border-l-4 border-purple-500">
                    <p class="text-sm font-medium text-gray-500">Pending DSS Evaluations</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">8</p>
                    <p class="text-xs text-gray-500 mt-1">COT scores need encoding</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 border-b pb-2">Institutional Management Modules</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                        <div class="border rounded-lg p-5 hover:shadow-md transition">
                            <h4 class="font-bold text-emerald-800 flex items-center mb-3">
                                <span class="bg-emerald-100 p-2 rounded mr-3">📚</span> Academic Performance
                            </h4>
                            <ul class="space-y-2 text-sm text-gray-600 mb-4">
                                <li>• Review pending Daily Lesson Logs</li>
                                <li>• Encode Classroom Observation (COT)</li>
                                <li>• View Faculty DSS Rankings</li>
                            </ul>
                            <a href="#" class="text-emerald-600 font-semibold hover:underline text-sm">Access
                                Academic Module →</a>
                        </div>

                        <div class="border rounded-lg p-5 hover:shadow-md transition">
                            <h4 class="font-bold text-amber-800 flex items-center mb-3">
                                <span class="bg-amber-100 p-2 rounded mr-3">⚖️</span> Behavioral Oversight
                            </h4>
                            <ul class="space-y-2 text-sm text-gray-600 mb-4">
                                <li>• Track major/minor offense trends</li>
                                <li>• Sign off on student suspensions</li>
                                <li>• Monitor Good Moral issuance rates</li>
                            </ul>
                            <a href="#" class="text-amber-600 font-semibold hover:underline text-sm">Access
                                Behavioral Oversight →</a>
                        </div>

                        <div class="border rounded-lg p-5 hover:shadow-md transition">
                            <h4 class="font-bold text-blue-800 flex items-center mb-3">
                                <span class="bg-blue-100 p-2 rounded mr-3">💻</span> Asset Accountability
                            </h4>
                            <ul class="space-y-2 text-sm text-gray-600 mb-4">
                                <li>• Review total functional school assets</li>
                                <li>• Approve property condemnation</li>
                                <li>• Monitor faculty clearance blocking</li>
                            </ul>
                            <a href="#" class="text-blue-600 font-semibold hover:underline text-sm">Access
                                Inventory Oversight →</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="bg-indigo-900 rounded-lg p-6 text-white shadow-md flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-bold">Generate Institutional Reports</h3>
                    <p class="text-indigo-200 text-sm mt-1">Export comprehensive PDF analytics for your monthly DepEd
                        Division Office submissions.</p>
                </div>
                <button
                    class="bg-white text-indigo-900 px-6 py-2 rounded font-bold hover:bg-indigo-50 transition shadow">
                    Go to Report Generator
                </button>
            </div>

        </div>
    </div>
</x-app-layout>
