<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePersonnelRequest;
use App\Http\Requests\Admin\UpdatePersonnelRequest;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PersonnelController extends Controller
{
    public function index(): View
    {
        $users = User::with('permissions')->orderBy('role')->orderBy('last_name')->get();
        $permissions = Permission::orderBy('module_name')->orderBy('action_name')->get();

        return view('admin.personnel.index', compact('users', 'permissions'));
    }

    public function store(StorePersonnelRequest $request): RedirectResponse
    {
        $password = Str::password(12);

        $user = User::create([
            ...$request->safe()->except('permissions'),
            'is_active' => $request->boolean('is_active', true),
            'password' => Hash::make($password),
            'email_verified_at' => now(),
        ]);

        $user->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.personnel.index')->with('status', "Personnel account created. Temporary password: {$password}");
    }

    public function update(UpdatePersonnelRequest $request, User $personnel): RedirectResponse
    {
        $personnel->update([
            ...$request->safe()->except('permissions'),
            'is_active' => $request->boolean('is_active'),
        ]);

        $personnel->permissions()->sync($request->input('permissions', []));

        return redirect()->route('admin.personnel.index')->with('status', 'Personnel record updated successfully.');
    }

    public function destroy(User $personnel): RedirectResponse
    {
        $personnel->update(['is_active' => false]);

        return redirect()->route('admin.personnel.index')->with('status', 'Personnel account has been deactivated.');
    }
}
