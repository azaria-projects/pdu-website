<?php

namespace App\Http\Requests\News;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:48|unique:news,name',
            'link'        => 'required|string|max:256|unique:news,link',
            'status'      => 'nullable|string|in:active,inactive',
            'image_id'    => 'nullable|integer|exists:files,id',
            'description' => 'required|string|max:128',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
