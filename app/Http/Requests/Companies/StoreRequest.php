<?php

namespace App\Http\Requests\Companies;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'       => 'nullable|string|max:128',
            'email'      => 'nullable|string|max:256|unique:companies,email',
            'motto'      => 'nullable|string|max:128',
            'vision'     => 'nullable|string|max:256',
            'mission'    => 'nullable|string|max:256',
            'icon_id'    => 'nullable|integer|exists:files,id',
            'facebook'   => 'nullable|string|max:128|unique:companies,facebook',
            'linkedin'   => 'nullable|string|max:128|unique:companies,linkedin',
            'instagram'  => 'nullable|string|max:128|unique:companies,instagram',
            'is_partner' => 'nullable|boolean'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
