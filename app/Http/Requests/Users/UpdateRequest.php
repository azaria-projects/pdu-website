<?php

namespace App\Http\Requests\Users;

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
                'max:32', 
                Rule::unique('users', 'name')->ignore($this->route('dat')->id),
            ],
            'email' => [
                'nullable', 
                'string', 
                'max:32', 
                Rule::unique('users', 'email')->ignore($this->route('dat')->id),
            ],
            'role'     => 'nullable|string|in:admin,user',
            'password' => 'nullable|string|max:128',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
