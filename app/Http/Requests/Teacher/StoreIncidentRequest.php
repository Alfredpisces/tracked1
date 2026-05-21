<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreIncidentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_lrn' => ['required', 'digits:12'],
            'student_first_name' => ['nullable', 'string', 'max:255'],
            'student_last_name' => ['nullable', 'string', 'max:255'],
            'grade_level' => ['nullable', 'string', 'max:50'],
            'section' => ['nullable', 'string', 'max:100'],
            'incident_date' => ['required', 'date'],
            'severity' => ['required', Rule::in(['minor', 'major'])],
            'offense_type' => ['required', 'string', 'max:255'],
            'narrative' => ['required', 'string'],
        ];
    }
}
