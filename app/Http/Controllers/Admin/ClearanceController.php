<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class ClearanceController extends Controller
{
    public function index(): View
    {
        $personnel = User::whereHas('assetAssignments', function ($query) {
            $query->whereNull('released_at')->whereHas('asset', fn ($assetQuery) => $assetQuery->whereIn('condition_status', ['damaged', 'lost']));
        })->with(['assetAssignments.asset'])->get();

        return view('admin.inventory.clearance', compact('personnel'));
    }
}
