<?php

namespace App\Http\Controllers\SchoolHead;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use Illuminate\View\View;

class InventoryOversightController extends Controller
{
    public function index(): View
    {
        $totalAssets = Asset::count();
        $functionalAssets = Asset::where('condition_status', 'functional')->count();
        $reportedIssues = Asset::whereIn('condition_status', ['damaged', 'lost'])->count();
        $blockedClearances = Asset::whereIn('condition_status', ['damaged', 'lost'])->whereHas('currentAssignment')->count();
        $pendingCondemnations = Asset::with('currentAssignment.user')->where('condition_status', 'condemned')->get();

        return view('school_head.inventory_oversight.index', compact('totalAssets', 'functionalAssets', 'reportedIssues', 'blockedClearances', 'pendingCondemnations'));
    }
}
