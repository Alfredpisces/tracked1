<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreProfessionalGrowthRequest;
use App\Models\CotRating;
use App\Models\ProfessionalGrowth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PerformanceController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();
        $growthEntries = $user->professionalGrowthEntries()->latest('date_attended')->get();
        $cotRatings = $user->cotRatings()->latest('rating_date')->get();
        $approvedDllCount = $user->authoredDailyLessonLogs()->where('status', 'approved')->count();
        $totalDllCount = max(1, $user->authoredDailyLessonLogs()->count());

        $stats = [
            'dll_compliance_rate' => round(($approvedDllCount / $totalDllCount) * 100),
            'average_cot_score' => round((float) $cotRatings->avg('score'), 2),
            'professional_growth_points' => round((float) $growthEntries->sum('points'), 2),
        ];

        return view('teacher.performance.index', compact('growthEntries', 'cotRatings', 'stats'));
    }

    public function createSeminar(): View
    {
        return view('teacher.performance.upload_seminar');
    }

    public function storeSeminar(StoreProfessionalGrowthRequest $request): RedirectResponse
    {
        $path = $request->file('certificate_file')?->store('professional-growth', 'local');

        ProfessionalGrowth::create([
            'teacher_id' => $request->user()->id,
            'title' => $request->string('title')->toString(),
            'date_attended' => $request->date('date_attended'),
            'points' => $request->input('points'),
            'certificate_path' => $path,
            'verification_status' => 'pending',
        ]);

        return redirect()->route('teacher.performance.index')->with('status', 'Professional growth record submitted for verification.');
    }
}
