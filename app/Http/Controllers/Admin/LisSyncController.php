<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SyncLisRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LisSyncController extends Controller
{
    public function index(): View
    {
        $summary = Cache::get('lis_sync_summary', [
            'last_run' => null,
            'inserted' => 0,
            'updated' => 0,
            'skipped' => 0,
        ]);

        return view('admin.lis_sync.index', compact('summary'));
    }

    public function sync(SyncLisRequest $request): RedirectResponse
    {
        $file = $request->file('lis_file');
        $inserted = 0;
        $updated = 0;
        $skipped = 0;

        if ($file && Str::endsWith(Str::lower($file->getClientOriginalName()), '.csv')) {
            $rows = array_map('str_getcsv', file($file->getRealPath()));
            array_shift($rows);

            foreach ($rows as $row) {
                $lrn = preg_replace('/\D+/', '', (string) ($row[0] ?? ''));
                if (strlen($lrn) !== 12) {
                    $skipped++;
                    continue;
                }

                $student = Student::where('lrn', $lrn)->first();
                $payload = [
                    'first_name' => $row[1] ?? null,
                    'last_name' => $row[2] ?? null,
                    'grade_level' => $row[3] ?? null,
                    'section' => $row[4] ?? null,
                    'last_synced_at' => now(),
                ];

                if ($student) {
                    $student->update($payload);
                    $updated++;
                } else {
                    Student::create(['lrn' => $lrn, ...$payload]);
                    $inserted++;
                }
            }
        } else {
            $skipped = 1;
        }

        Cache::put('lis_sync_summary', [
            'last_run' => now(),
            'inserted' => $inserted,
            'updated' => $updated,
            'skipped' => $skipped,
        ], now()->addDay());

        return redirect()->route('admin.lis_sync.index')->with('status', 'LIS sync completed.');
    }
}
