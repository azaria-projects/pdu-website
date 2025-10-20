<?php

namespace App\Http\Requests\Testimonies;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'       => 'nullable|string|max:128',
            'role'       => 'nullable|string|max:32',
            'testimony'  => 'nullable|string|max:284',
            'company_id' => 'nullable|integer|exists:companies,id',
            'status'     => 'nullable|string|in:active,inactive',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
