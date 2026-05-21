<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\StoreDailyLessonLogRequest;
use App\Http\Requests\Teacher\UpdateDailyLessonLogRequest;
use App\Models\DailyLessonLog;
use App\Services\Ai\DllPrecheckerClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DailyLessonLogController extends Controller
{
    public function index(Request $request): View
    {
        $dailyLessonLogs = $request->user()->authoredDailyLessonLogs()->latest('target_date')->get();

        return view('teacher.dll.index', compact('dailyLessonLogs'));
    }

    public function create(Request $request): View
    {
        return view('teacher.dll.create', [
            'draftKey' => 'dll_draft_'.$request->user()->id.'_new',
        ]);
    }

    public function store(StoreDailyLessonLogRequest $request): RedirectResponse|JsonResponse
    {
        $payload = $request->validated();
        $action = $payload['action'] ?? 'draft';
        unset($payload['action'], $payload['last_known_server_updated_at']);

        $dailyLessonLog = DailyLessonLog::create([
            ...$payload,
            'author_id' => $request->user()->id,
            'status' => $action === 'submit' ? 'pending' : 'draft',
            'submitted_at' => $action === 'submit' ? now() : null,
        ]);

        return $this->successResponse($request, $dailyLessonLog, 'Daily Lesson Log saved successfully.');
    }

    public function show(Request $request, DailyLessonLog $dll): View
    {
        abort_unless($dll->author_id === $request->user()->id || in_array($request->user()->role, ['school_head', 'admin'], true), 403);

        return view('teacher.dll.show', ['dailyLessonLog' => $dll]);
    }

    public function edit(Request $request, DailyLessonLog $dll): View
    {
        abort_unless($dll->author_id === $request->user()->id, 403);

        return view('teacher.dll.edit', [
            'dailyLessonLog' => $dll,
            'draftKey' => 'dll_draft_'.$request->user()->id.'_'.$dll->id,
        ]);
    }

    public function update(UpdateDailyLessonLogRequest $request, DailyLessonLog $dll): RedirectResponse|JsonResponse
    {
        abort_unless($dll->author_id === $request->user()->id, 403);

        if ($request->filled('last_known_server_updated_at')
            && optional($dll->updated_at)->toISOString() !== optional($request->date('last_known_server_updated_at'))->toISOString()) {
            $message = 'This DLL was updated elsewhere. Refresh the page before retrying.';

            if ($request->expectsJson()) {
                return response()->json(['message' => $message], 409);
            }

            return back()->withErrors(['dll' => $message])->withInput();
        }

        $payload = $request->validated();
        $action = $payload['action'] ?? 'draft';
        unset($payload['action'], $payload['last_known_server_updated_at']);

        $dll->fill($payload);
        $dll->status = $action === 'submit' ? 'pending' : 'draft';
        $dll->submitted_at = $action === 'submit' ? now() : $dll->submitted_at;
        $dll->save();

        return $this->successResponse($request, $dll, 'Daily Lesson Log updated successfully.');
    }

    public function destroy(Request $request, DailyLessonLog $dll): RedirectResponse
    {
        abort_unless($dll->author_id === $request->user()->id, 403);
        $dll->delete();

        return redirect()->route('teacher.dll.index')->with('status', 'DLL deleted successfully.');
    }

    public function precheck(StoreDailyLessonLogRequest $request, DllPrecheckerClient $client): JsonResponse
    {
        $result = $client->precheck($request->validated());

        return response()->json($result);
    }

    protected function successResponse(Request $request, DailyLessonLog $dailyLessonLog, string $message): RedirectResponse|JsonResponse
    {
        if ($request->expectsJson()) {
            return response()->json([
                'message' => $message,
                'daily_lesson_log_id' => $dailyLessonLog->id,
                'status' => $dailyLessonLog->status,
                'updated_at' => optional($dailyLessonLog->updated_at)->toISOString(),
            ]);
        }

        return redirect()->route('teacher.dll.edit', $dailyLessonLog)
            ->with('status', $message)
            ->with('dll_saved', 'dll_draft_'.$request->user()->id.'_'.$dailyLessonLog->id);
    }
}
