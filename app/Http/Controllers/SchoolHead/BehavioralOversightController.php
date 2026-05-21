<?php

namespace App\Http\Controllers\SchoolHead;

use App\Http\Controllers\Controller;
use App\Models\IncidentReport;
use Illuminate\View\View;

class BehavioralOversightController extends Controller
{
    public function index(): View
    {
        $majorCount = IncidentReport::where('severity', 'major')->count();
        $minorCount = IncidentReport::where('severity', 'minor')->count();
        $resolvedRate = IncidentReport::count() === 0 ? 0 : round((IncidentReport::where('status', 'resolved')->count() / IncidentReport::count()) * 100);
        $escalatedCases = IncidentReport::with('student')->where('status', 'escalated')->latest('incident_date')->get();

        return view('school_head.behavioral_oversight.index', compact('majorCount', 'minorCount', 'resolvedRate', 'escalatedCases'));
    }
}
