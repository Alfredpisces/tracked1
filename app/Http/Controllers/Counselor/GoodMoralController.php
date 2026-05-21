<?php

namespace App\Http\Controllers\Counselor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Counselor\GenerateGoodMoralRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GoodMoralController extends Controller
{
    public function index(Request $request): View
    {
        $student = null;
        if ($request->filled('student_lrn')) {
            $student = Student::where('lrn', $request->string('student_lrn')->toString())->first();
        }

        return view('counselor.good_moral.index', compact('student'));
    }

    public function generate(GenerateGoodMoralRequest $request)
    {
        $student = Student::where('lrn', $request->string('student_lrn')->toString())->firstOrFail();
        abort_unless($student->isEligibleForGoodMoral(), 422, 'Student is not eligible for a Good Moral certificate.');

        $content = view('counselor.good_moral.certificate', compact('student'))->render();

        return response()->streamDownload(function () use ($content) {
            echo $content;
        }, Str::slug($student->full_name ?: $student->lrn).'-good-moral.html', [
            'Content-Type' => 'text/html; charset=UTF-8',
        ]);
    }
}
