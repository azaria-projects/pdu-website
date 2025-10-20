<?php

namespace App\Http\Requests\Companies;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'      => 'nullable|string|max:128',
            'email'     => [
                'nullable', 
                'string', 
                'max:128', 
                Rule::unique('companies', 'email')->ignore($this->route('dat')->id),
            ],
            'motto'     => 'nullable|string|max:128',
            'vision'    => 'nullable|string|max:256',
            'mission'   => 'nullable|string|max:256',
            'icon_id'   => 'nullable|integer|exists:files,id',
            'facebook'  => [
                'nullable', 
                'string', 
                'max:128', 
                Rule::unique('companies', 'facebook')->ignore($this->route('dat')->id),
            ],
            'linkedin'  => [
                'nullable', 
                'string', 
                'max:128', 
                Rule::unique('companies', 'linkedin')->ignore($this->route('dat')->id),
            ],
            'instagram' => [
                'nullable', 
                'string', 
                'max:128', 
                Rule::unique('companies', 'instagram')->ignore($this->route('dat')->id),
            ],
            'is_partner' => 'nullable|boolean'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
