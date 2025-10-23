<?php

namespace App\Http\Requests\Files;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'file' => 'required|file|mimes:pdf,svg,jpeg,jpg',
            'type' => 'required|string|in:banner,thumbnail,icon,logo,document,sliders,others',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
