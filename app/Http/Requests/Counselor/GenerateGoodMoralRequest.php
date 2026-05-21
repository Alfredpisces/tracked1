<?php

namespace App\Http\Requests\Counselor;

use Illuminate\Foundation\Http\FormRequest;

class GenerateGoodMoralRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_lrn' => ['required', 'digits:12', 'exists:students,lrn'],
        ];
    }
}
