<?php

namespace App\Http\Controllers\Counselor;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ViolatorController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('q')->toString();
        $students = Student::withCount('incidentReports')
            ->with(['incidentReports' => fn ($query) => $query->latest('incident_date')])
            ->when($search, fn ($query) => $query->where('lrn', 'like', "%{$search}%"))
            ->get();

        return view('counselor.violators.index', compact('students', 'search'));
    }
}
