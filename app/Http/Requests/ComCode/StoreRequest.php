<?php

namespace App\Http\Requests\ComCode;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:64|unique:com_codes,name',
            'value' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
