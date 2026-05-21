<?php

namespace App\Http\Controllers\SchoolHead;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\DailyLessonLog;
use App\Models\IncidentReport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function index(): View
    {
        return view('school_head.reports.index');
    }

    public function generate(Request $request)
    {
        $type = $request->validate([
            'report_type' => ['required', 'in:behavioral,inventory,academic'],
        ])['report_type'];

        $content = match ($type) {
            'behavioral' => 'Behavioral incidents: '.IncidentReport::count(),
            'inventory' => 'Total assets: '.Asset::count(),
            default => 'Daily lesson logs: '.DailyLessonLog::count(),
        };

        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, Str::slug($type).'-report.txt', ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
