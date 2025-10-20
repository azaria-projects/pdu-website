<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestimonyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'role'       => $this->role,
            'status'     => $this->status,
            'company'    => $this->company,
            'testimony'  => $this->testimony,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
