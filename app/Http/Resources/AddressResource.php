<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'street'     => $this->street,
            'city'       => $this->city,
            'country'    => $this->country,
            'pos_code'   => $this->pos_code,
            'province'   => $this->province,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
