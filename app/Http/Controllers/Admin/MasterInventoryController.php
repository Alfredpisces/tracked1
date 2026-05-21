<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAssetAssignmentRequest;
use App\Models\Asset;
use App\Models\AssetAssignment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MasterInventoryController extends Controller
{
    public function index(): View
    {
        $assets = Asset::with('currentAssignment.user')->latest()->get();
        $teachers = User::where('role', 'teacher')->where('is_active', true)->orderBy('last_name')->get();

        return view('admin.inventory.index', compact('assets', 'teachers'));
    }

    public function store(StoreAssetAssignmentRequest $request): RedirectResponse
    {
        $asset = Asset::updateOrCreate([
            'serial_number' => $request->string('serial_number')->toString(),
        ], [
            'name' => $request->string('name')->toString(),
            'asset_type' => $request->string('asset_type')->toString(),
            'condition_status' => $request->input('condition_status', 'functional'),
            'status' => 'assigned',
            'notes' => $request->input('notes'),
        ]);

        $asset->assignments()->whereNull('released_at')->update([
            'released_at' => now(),
            'assignment_status' => 'released',
        ]);

        AssetAssignment::create([
            'asset_id' => $asset->id,
            'user_id' => $request->integer('user_id'),
            'assigned_by' => $request->user()->id,
            'assigned_at' => now(),
            'assignment_status' => 'pending_signature',
            'notes' => $request->input('notes'),
        ]);

        return redirect()->route('admin.inventory.index')->with('status', 'Asset assignment recorded successfully.');
    }

    public function update(Request $request, Asset $inventory): RedirectResponse
    {
        $data = $request->validate([
            'condition_status' => ['required', 'in:functional,damaged,lost,condemned,replaced'],
        ]);

        $inventory->update($data);

        return redirect()->route('admin.inventory.index')->with('status', 'Asset condition updated successfully.');
    }
}
