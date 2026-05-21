<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('System-Based DLL Builder') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div id="network-status"
                        class="hidden mb-4 p-3 rounded bg-yellow-100 text-yellow-800 text-sm font-medium">
                        You are currently offline. Don't worry, your drafts are being saved locally.
                    </div>

                    <form id="dll-form" action="{{ route('dll.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                                <input type="text" name="subject" id="subject"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    placeholder="e.g., Grade 9 Science" required>
                            </div>
                            <div>
                                <label for="target_date" class="block text-sm font-medium text-gray-700">Date</label>
                                <input type="date" name="target_date" id="target_date"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label for="objectives" class="block text-sm font-medium text-gray-700">Objectives</label>
                            <textarea name="objectives" id="objectives" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="State competencies and learning outcomes..."></textarea>
                        </div>

                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Key concepts, topics, and content standards..."></textarea>
                        </div>

                        <div>
                            <label for="learning_resources" class="block text-sm font-medium text-gray-700">Learning
                                Resources</label>
                            <textarea name="learning_resources" id="learning_resources" rows="2"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Textbooks, modules, links, and materials..."></textarea>
                        </div>

                        <div>
                            <label for="procedures" class="block text-sm font-medium text-gray-700">Procedures</label>
                            <textarea name="procedures" id="procedures" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="List lesson flow and classroom activities..."></textarea>
                        </div>

                        <div>
                            <label for="reflection" class="block text-sm font-medium text-gray-700">Reflection</label>
                            <textarea name="reflection" id="reflection" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="What went well, adjustments, and learner response..."></textarea>
                        </div>

                        <div class="flex items-center gap-4 pt-4 border-t border-gray-200">
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-gray-800 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                💾 Save DLL
                            </button>

                            <button type="button" id="ai-precheck-btn"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                🪄 Run AI Pre-Check
                            </button>

                            <span id="save-status" class="text-sm text-gray-500 italic ml-auto"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('dll-form');
            const statusText = document.getElementById('save-status');
            const networkStatus = document.getElementById('network-status');

            // 1. Monitor Internet Connection
            window.addEventListener('offline', () => networkStatus.classList.remove('hidden'));
            window.addEventListener('online', () => networkStatus.classList.add('hidden'));

            // 2. Load cached draft from local browser storage on page load
            const cachedDLL = JSON.parse(localStorage.getItem('dll_draft'));
            if (cachedDLL) {
                Object.keys(cachedDLL).forEach(key => {
                    if (form.elements[key]) form.elements[key].value = cachedDLL[key];
                });
                statusText.innerText = "Draft restored from local storage.";
            }

            // 3. Save to local storage automatically as the teacher types
            form.addEventListener('input', function() {
                let draftData = {};
                new FormData(form).forEach((value, key) => {
                    if (key !== '_token') draftData[key] = value;
                });
                localStorage.setItem('dll_draft', JSON.stringify(draftData));
                statusText.innerText = "Draft saved locally at " + new Date().toLocaleTimeString();
            });

            // 4. Clear local storage ONLY when successfully submitted
            form.addEventListener('submit', function() {
                // If we submit successfully, we don't need the local backup anymore
                localStorage.removeItem('dll_draft');
            });
        });
    </script>
</x-app-layout>
