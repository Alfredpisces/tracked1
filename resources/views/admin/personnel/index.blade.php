<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Manage Personnel & PBAC') }}</h2></x-slot>
    <div class="space-y-6">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h3 class="font-bold text-gray-900 mb-4">Create Personnel Account</h3>
            <form action="{{ route('admin.personnel.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    <input name="employee_id" value="{{ old('employee_id') }}" placeholder="Employee ID" class="rounded-md border-gray-300 shadow-sm" required>
                    <input name="first_name" value="{{ old('first_name') }}" placeholder="First Name" class="rounded-md border-gray-300 shadow-sm" required>
                    <input name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" class="rounded-md border-gray-300 shadow-sm" required>
                    <input name="email" type="email" value="{{ old('email') }}" placeholder="Email" class="rounded-md border-gray-300 shadow-sm" required>
                    <select name="role" class="rounded-md border-gray-300 shadow-sm"><option value="teacher">Teacher</option><option value="counselor">Counselor</option><option value="school_head">School Head</option><option value="admin">Admin</option></select>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-700 mb-2">PBAC Permissions</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-2 text-sm">
                        @foreach ($permissions as $permission)
                            <label class="inline-flex items-center gap-2"><input type="checkbox" name="permissions[]" value="{{ $permission->id }}">{{ $permission->action_name }}</label>
                        @endforeach
                    </div>
                </div>
                <label class="inline-flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" value="1" checked> Active</label>
                <div><button type="submit" class="inline-flex rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white">Create Account</button></div>
            </form>
        </div>
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50"><tr><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Personnel</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Permissions</th><th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th></tr></thead>
                <tbody class="divide-y divide-gray-200 bg-white">@foreach($users as $person)<tr><td class="px-6 py-4 text-sm text-gray-900">{{ $person->name }}<div class="text-xs text-gray-500">{{ $person->email }}</div></td><td class="px-6 py-4 text-sm uppercase">{{ $person->role }}</td><td class="px-6 py-4 text-xs text-gray-600">{{ $person->permissions->pluck('action_name')->implode(', ') ?: 'No granular permissions assigned' }}</td><td class="px-6 py-4 text-sm">{{ $person->is_active ? 'Active' : 'Inactive' }}</td></tr>@endforeach</tbody>
            </table>
        </div>
    </div>
</x-app-layout>
