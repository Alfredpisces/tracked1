<?php

namespace App\Http\Controllers\Counselor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Counselor\ResolveIncidentRequest;
use App\Models\CounselingIntervention;
use App\Models\IncidentReport;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IncidentReviewController extends Controller
{
    public function index(): View
    {
        $incidentReports = IncidentReport::with(['student', 'teacher'])->whereNotIn('status', ['resolved', 'closed'])->latest('incident_date')->get();

        return view('counselor.incidents.index', compact('incidentReports'));
    }

    public function resolve(ResolveIncidentRequest $request, IncidentReport $incident): RedirectResponse
    {
        $incident->update([
            'status' => $request->string('status')->toString(),
            'counselor_id' => $request->user()->id,
            'counselor_notes' => $request->string('notes')->toString(),
            'principal_action' => $request->input('principal_action'),
            'resolved_at' => $request->input('status') === 'resolved' ? now() : null,
        ]);

        CounselingIntervention::create([
            'incident_report_id' => $incident->id,
            'counselor_id' => $request->user()->id,
            'intervention_type' => $request->input('intervention_type'),
            'notes' => $request->string('notes')->toString(),
            'scheduled_at' => $request->date('scheduled_at'),
            'completed_at' => $request->input('status') === 'resolved' ? now() : null,
            'outcome' => $request->input('status'),
        ]);

        return redirect()->route('counselor.incidents.index')->with('status', 'Incident case updated successfully.');
    }
}
