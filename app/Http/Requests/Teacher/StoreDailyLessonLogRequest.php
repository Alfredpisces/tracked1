<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDailyLessonLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'target_date' => ['required', 'date'],
            'subject' => ['required', 'string', 'max:255'],
            'objectives' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'learning_resources' => ['nullable', 'string'],
            'procedures' => ['nullable', 'string'],
            'reflection' => ['nullable', 'string'],
            'action' => ['nullable', Rule::in(['draft', 'submit'])],
            'last_known_server_updated_at' => ['nullable', 'date'],
        ];
    }
}
