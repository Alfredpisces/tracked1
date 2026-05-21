<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SyncLisRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'lis_file' => ['required', 'file', 'mimes:csv,txt,xlsx,xls'],
        ];
    }
}
