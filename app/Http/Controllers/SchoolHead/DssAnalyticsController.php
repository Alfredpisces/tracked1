<?php

namespace App\Http\Controllers\SchoolHead;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class DssAnalyticsController extends Controller
{
    public function index(): View
    {
        $teachers = User::where('role', 'teacher')
            ->with(['cotRatings', 'professionalGrowthEntries', 'authoredDailyLessonLogs'])
            ->get()
            ->map(function (User $teacher) {
                $dllScore = $teacher->authoredDailyLessonLogs->count() === 0
                    ? 0
                    : round(($teacher->authoredDailyLessonLogs->where('status', 'approved')->count() / max(1, $teacher->authoredDailyLessonLogs->count())) * 40, 2);
                $cotScore = round(((float) $teacher->cotRatings->avg('score') / 5) * 40, 2);
                $growthScore = min(20, round((float) $teacher->professionalGrowthEntries->sum('points'), 2));
                $teacher->dss_score = round($dllScore + $cotScore + $growthScore, 2);
                return $teacher;
            })
            ->sortByDesc('dss_score')
            ->values();

        return view('school_head.dss.index', compact('teachers'));
    }
}
