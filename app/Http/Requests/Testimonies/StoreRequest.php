<?php

namespace App\Http\Requests\Testimonies;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'       => 'required|string|max:128',
            'role'       => 'required|string|max:32',
            'testimony'  => 'nullable|string|max:384',
            'company_id' => 'required|integer|exists:companies,id',
            'status'     => 'nullable|string|in:active,inactive',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
