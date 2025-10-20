<?php

namespace App\Http\Requests\News;

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
                'max:48', 
                Rule::unique('news', 'name')->ignore($this->route('dat')->id),
            ],
            'link' => [
                'nullable', 
                'string', 
                'max:256', 
                Rule::unique('news', 'link')->ignore($this->route('dat')->id),
            ],
            'status'      => 'nullable|string|in:active,inactive',
            'image_id'    => 'nullable|integer|exists:files,id',
            'description' => 'nullable|string|max:128',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
