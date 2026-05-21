<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreIncidentRequest;
use App\Models\IncidentReport;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IncidentController extends Controller
{
    public function index(Request $request): View
    {
        $incidentReports = $request->user()->incidentReports()->with('student')->latest('incident_date')->get();

        return view('teacher.incidents.index', compact('incidentReports'));
    }

    public function create(): View
    {
        return view('teacher.incidents.create');
    }

    public function store(StoreIncidentRequest $request): RedirectResponse
    {
        $student = Student::updateOrCreate([
            'lrn' => $request->string('student_lrn')->toString(),
        ], [
            'first_name' => $request->input('student_first_name'),
            'last_name' => $request->input('student_last_name'),
            'grade_level' => $request->input('grade_level'),
            'section' => $request->input('section'),
        ]);

        IncidentReport::create([
            'teacher_id' => $request->user()->id,
            'student_id' => $student->id,
            'incident_date' => $request->date('incident_date'),
            'severity' => $request->string('severity')->toString(),
            'offense_type' => $request->string('offense_type')->toString(),
            'narrative' => $request->string('narrative')->toString(),
        ]);

        return redirect()->route('teacher.incidents.index')->with('status', 'Incident report submitted to the Guidance Office.');
    }
}
