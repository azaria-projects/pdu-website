<?php

namespace App\Http\Requests\Addresses;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'city'       => 'required|string|max:128',
            'street'     => 'required|string|max:256',
            'country'    => 'required|string|max:128',
            'pos_code'   => 'required|integer',
            'province'   => 'required|string|max:128',
            'company_id' => 'required|integer|exists:companies,id',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
