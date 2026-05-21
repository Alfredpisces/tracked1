<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Institutional Asset Oversight') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white p-6 rounded-lg shadow-sm border-t-4 border-blue-600 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Total Government Property Health</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="border rounded p-4 text-center">
                        <p class="text-sm text-gray-500">Total Deployed Assets</p>
                        <p class="text-2xl font-black text-gray-900">1,245</p>
                    </div>
                    <div class="border rounded p-4 text-center bg-green-50">
                        <p class="text-sm text-green-700">Functional & Acknowledged</p>
                        <p class="text-2xl font-black text-green-800">1,190</p>
                    </div>
                    <div class="border rounded p-4 text-center bg-red-50">
                        <p class="text-sm text-red-700">Reported Damaged / Lost</p>
                        <p class="text-2xl font-black text-red-800">12</p>
                    </div>
                    <div class="border rounded p-4 text-center bg-gray-50">
                        <p class="text-sm text-gray-600">Pending Clearances Blocked</p>
                        <p class="text-2xl font-black text-gray-800">5</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-l-4 border-amber-500">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Pending Condemnation Approvals</h3>
                    <p class="text-sm text-gray-600 mb-4">Review requests from the Property Custodian to officially
                        write off unrepairable items. Approving these will release the accountability from the assigned
                        teacher, allowing their year-end clearance to generate.</p>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Item
                                        Details</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Assigned
                                        Teacher</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        Custodian Report</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">Smart TV 55"</div>
                                        <div class="text-xs text-gray-500">STV-2023-00811</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Juan Dela Cruz</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 italic">"Motherboard
                                        fried. Unrepairable."</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button
                                            class="px-3 py-1 bg-red-600 text-white rounded text-xs font-bold hover:bg-red-700 mr-2">Approve
                                            Write-off</button>
                                        <button
                                            class="px-3 py-1 bg-gray-200 text-gray-700 rounded text-xs font-bold hover:bg-gray-300">Request
                                            Audit</button>
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
