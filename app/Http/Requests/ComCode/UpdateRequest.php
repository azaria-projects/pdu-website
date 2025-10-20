<?php

namespace App\Http\Requests\ComCode;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => [
                'nullable', 
                'string', 
                'max:64', 
                Rule::unique('com_codes', 'name')->ignore($this->route('dat')->id),
            ],
            'value' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
