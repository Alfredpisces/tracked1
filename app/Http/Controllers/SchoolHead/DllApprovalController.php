<?php

namespace App\Http\Controllers\SchoolHead;

use App\Http\Controllers\Controller;
use App\Models\DailyLessonLog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DllApprovalController extends Controller
{
    public function index(): View
    {
        $dailyLessonLogs = DailyLessonLog::with('author')->latest('submitted_at')->get();

        return view('school_head.dll.index', compact('dailyLessonLogs'));
    }

    public function approve(Request $request, DailyLessonLog $dll): RedirectResponse
    {
        $dll->update([
            'reviewer_id' => $request->user()->id,
            'status' => 'approved',
            'is_ai_passed' => true,
        ]);

        return back()->with('status', 'DLL approved successfully.');
    }

    public function returnForRevision(Request $request, DailyLessonLog $dll): RedirectResponse
    {
        $data = $request->validate([
            'review_feedback' => ['required', 'string'],
        ]);

        $dll->update([
            'reviewer_id' => $request->user()->id,
            'status' => 'returned',
            'reflection' => trim(($dll->reflection ? $dll->reflection."\n\n" : '').'Review feedback: '.$data['review_feedback']),
        ]);

        return back()->with('status', 'DLL returned for revision.');
    }
}
