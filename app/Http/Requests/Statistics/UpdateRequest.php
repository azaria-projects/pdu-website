<?php

namespace App\Http\Requests\Statistics;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'icon'        => 'nullable|string|max:128',
            'value'       => 'nullable|string|max:8',
            'description' => 'nullable|string|max:32',
            'status'      => 'nullable|string|in:active,inactive',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
