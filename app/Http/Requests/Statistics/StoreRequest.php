<?php

namespace App\Http\Requests\Statistics;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'icon'        => 'required|string|max:128',
            'value'       => 'required|string|max:8',
            'description' => 'required|string|max:32',
            'status'      => 'nullable|string|in:active,inactive',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
