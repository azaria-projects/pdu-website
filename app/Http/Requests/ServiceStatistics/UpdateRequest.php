<?php

namespace App\Http\Requests\ServiceStatistics;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'icon'        => 'nullable|string|max:64',
            'value'       => 'nullable|string|max:8',
            'description' => 'nullable|string|max:32',
            'status'      => 'nullable|string|in:active,inactive',
            'service_id'  => 'nullable|integer|exists:services,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
