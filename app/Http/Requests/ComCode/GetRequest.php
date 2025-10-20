<?php

namespace App\Http\Requests\ComCode;

use App\Models\ComCode;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Http\FormRequest;

class GetRequest extends FormRequest
{
    public function rules(): array
    {
        $col = Schema::getColumnListing((new ComCode)->getTable());

        return [
            'fields'   => 'nullable|string',
            'limit'    => 'nullable|integer|min:1',
            'keyword'  => 'nullable|string|max:255',
            'order'    => 'nullable|string|in:asc,desc',
            'order_by' => ['nullable', 'string', Rule::in($col)],
            'type'     => 'nullable|string|in:icons,key-value,default-careers,default-company,others',
        ];
    }

    public function prepareForValidation()
    {
        if ($this->has('limit')) {
            $this->merge([
                'limit' => $this->input('limit') ? (int) $this->input('limit') : 15,
            ]);
        }
    }

    public function authorize(): bool
    {
        return true;
    }
}
