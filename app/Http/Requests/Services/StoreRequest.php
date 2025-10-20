<?php

namespace App\Http\Requests\Services;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:128|unique:services,name',
            'icon'        => 'required|string|max:64',
            'image_id'    => 'nullable|integer|exists:files,id',
            'status'      => 'nullable|string|in:active,inactive',
            'description' => 'required|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
