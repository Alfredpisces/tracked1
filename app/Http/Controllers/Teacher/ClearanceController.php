<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClearanceController extends Controller
{
    public function status(Request $request): View
    {
        $unresolvedAssignments = $request->user()->assetAssignments()
            ->with('asset')
            ->whereNull('released_at')
            ->whereHas('asset', fn ($query) => $query->whereIn('condition_status', ['damaged', 'lost']))
            ->get();

        return view('teacher.clearance.status', compact('unresolvedAssignments'));
    }
}
