<?php

namespace App\Http\Requests\Addresses;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'city'       => 'nullable|string|max:128',
            'street'     => 'nullable|string|max:256',
            'country'    => 'nullable|string|max:128',
            'pos_code'   => 'nullable|integer',
            'province'   => 'nullable|string|max:128',
            'company_id' => 'nullable|integer|exists:companies,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
