<?php

namespace App\Http\Requests\ServiceStatistics;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'icon'        => 'required|string|max:64',
            'value'       => 'required|string|max:8',
            'description' => 'required|string|max:32',
            'status'      => 'nullable|string|in:active,inactive',
            'service_id'  => 'required|integer|exists:services,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
