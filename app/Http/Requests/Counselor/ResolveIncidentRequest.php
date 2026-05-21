<?php

namespace App\Http\Requests\Counselor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResolveIncidentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', Rule::in(['resolved', 'in_intervention', 'escalated'])],
            'intervention_type' => ['nullable', 'string', 'max:255'],
            'notes' => ['required', 'string'],
            'scheduled_at' => ['nullable', 'date'],
            'principal_action' => ['nullable', 'string', 'max:255'],
        ];
    }
}
