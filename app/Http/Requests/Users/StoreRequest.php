<?php

namespace App\Http\Requests\Users;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:32',
            'role'     => 'required|string|in:admin,user',
            'email'    => 'required|string|unique:users,email',
            'password' => 'required|string|max:128',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
