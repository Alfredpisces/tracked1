<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report a Behavioral Incident') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-t-4 border-red-600">
                <div class="p-6 text-gray-900">

                    <div class="mb-6">
                        <h3 class="text-lg font-bold text-gray-800">Incident Details</h3>
                        <p class="text-sm text-gray-600">Log a violation using the student's Learner Reference Number
                            (LRN). This will notify the Guidance Office and block the student's Good Moral Certificate
                            until resolved.</p>
                    </div>

                    <form action="#" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="student_lrn" class="block text-sm font-medium text-gray-700">Student LRN (12
                                    Digits)</label>
                                <input type="text" name="student_lrn" id="student_lrn" pattern="\d{12}"
                                    maxlength="12"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                                    placeholder="e.g., 108123456789" required>
                            </div>

                            <div>
                                <label for="incident_date" class="block text-sm font-medium text-gray-700">Date of
                                    Incident</label>
                                <input type="date" name="incident_date" id="incident_date"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                                    required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="severity" class="block text-sm font-medium text-gray-700">Severity</label>
                                <select name="severity" id="severity"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                                    required>
                                    <option value="" disabled selected>Select severity...</option>
                                    <option value="minor">Minor Offense</option>
                                    <option value="major">Major Offense</option>
                                </select>
                            </div>

                            <div>
                                <label for="offense_type" class="block text-sm font-medium text-gray-700">Specific
                                    Violation</label>
                                <select name="offense_type" id="offense_type"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                                    required>
                                    <option value="" disabled selected>Select violation...</option>
                                    <optgroup label="Minor Offenses">
                                        <option value="disruptive_behavior">Disruptive Behavior</option>
                                        <option value="dress_code">Dress Code Violation</option>
                                        <option value="littering">Littering</option>
                                    </optgroup>
                                    <optgroup label="Major Offenses">
                                        <option value="bullying">Bullying / Harassment</option>
                                        <option value="vandalism">Vandalism</option>
                                        <option value="cheating">Cheating / Plagiarism</option>
                                        <option value="physical_altercation">Physical Altercation</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="narrative" class="block text-sm font-medium text-gray-700">Narrative
                                Description</label>
                            <textarea name="narrative" id="narrative" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                                placeholder="Describe exactly what happened, where it occurred, and who else was involved..." required></textarea>
                        </div>

                        <div class="flex items-center justify-end pt-4 border-t border-gray-200">
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                Submit Incident Report
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
