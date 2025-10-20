<?php

namespace App\Http\Requests\Users;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email'    => 'required|string',
            'password' => 'required|string|max:128',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
