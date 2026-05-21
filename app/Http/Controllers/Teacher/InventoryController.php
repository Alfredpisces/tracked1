<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InventoryController extends Controller
{
    public function index(Request $request): View
    {
        $assignments = $request->user()->assetAssignments()->with('asset')->whereNull('released_at')->latest('assigned_at')->get();

        return view('teacher.inventory.index', compact('assignments'));
    }
}
