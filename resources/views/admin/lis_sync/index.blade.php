<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('LIS Data Synchronization') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 border-t-4 border-indigo-600">
                        <h3 class="text-lg font-bold text-gray-800 mb-2">Upload LIS Masterlist</h3>
                        <p class="text-sm text-gray-600 mb-6">
                            Upload the official DepEd LIS Excel or CSV file to update the central student masterlist.
                            The system will execute an LRN-based upsert, strictly filtering and extracting only learners
                            with active behavioral infractions to optimize database storage.
                        </p>

                        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            <div>
                                <label for="lis_file" class="block text-sm font-medium text-gray-700">LIS Data
                                    File</label>
                                <div class="mt-1 flex items-center">
                                    <input type="file" name="lis_file" id="lis_file" accept=".xlsx, .xls, .csv"
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-300 rounded-md"
                                        required>
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Accepted formats: .xlsx, .xls, .csv</p>
                            </div>

                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-r-md">
                                <h4 class="text-sm font-bold text-blue-800 mb-2">File Format Hints</h4>
                                <ul class="list-disc list-inside text-xs text-blue-700 space-y-1">
                                    <li>LRN column must be exactly 12 digits (no spaces).</li>
                                    <li>Ensure the file is the unaltered export directly from the national DepEd portal.
                                    </li>
                                    <li>Students with clean behavioral records are automatically skipped during
                                        extraction to save space.</li>
                                </ul>
                            </div>

                            <div class="pt-4 border-t border-gray-200">
                                <button type="submit"
                                    class="inline-flex justify-center items-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    Run LIS Sync
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-fit">
                    <div class="p-6 text-gray-900 border-t-4 border-gray-300">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">Last Sync Summary</h3>

                        <div class="flex justify-between items-center mb-6">
                            <span class="text-sm text-gray-500">Last run:</span>
                            <span class="text-sm font-medium text-gray-900">Not yet synced</span>
                        </div>

                        <div class="grid grid-cols-3 gap-2 text-center">
                            <div class="bg-green-50 rounded-lg p-3 border border-green-100">
                                <span class="block text-xs font-semibold text-green-600 uppercase mb-1">Inserted</span>
                                <span class="block text-2xl font-bold text-green-700">0</span>
                            </div>

                            <div class="bg-blue-50 rounded-lg p-3 border border-blue-100">
                                <span class="block text-xs font-semibold text-blue-600 uppercase mb-1">Updated</span>
                                <span class="block text-2xl font-bold text-blue-700">0</span>
                            </div>

                            <div class="bg-yellow-50 rounded-lg p-3 border border-yellow-100">
                                <span class="block text-xs font-semibold text-yellow-600 uppercase mb-1">Skipped</span>
                                <span class="block text-2xl font-bold text-yellow-700">0</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
