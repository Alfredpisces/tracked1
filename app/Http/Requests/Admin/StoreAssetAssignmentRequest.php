<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAssetAssignmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'serial_number' => ['required', 'string', 'max:255'],
            'asset_type' => ['required', Rule::in(['epar', 'ics'])],
            'condition_status' => ['nullable', Rule::in(['functional', 'damaged', 'lost', 'condemned', 'replaced'])],
            'user_id' => ['required', 'exists:users,id'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
