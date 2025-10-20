<?php

namespace App\Http\Requests\Services;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'       => [
                'nullable', 
                'string', 
                'max:48', 
                Rule::unique('services', 'name')->ignore($this->route('dat')->id),
            ],
            'icon'        => 'nullable|string|max:64',
            'status'      => 'nullable|string|in:active,inactive',
            'image_id'    => 'nullable|integer|exists:files,id',
            'description' => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
