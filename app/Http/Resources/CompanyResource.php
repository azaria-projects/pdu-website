<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\FileResource;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'motto'      => $this->motto,
            'email'      => $this->email,
            'vision'     => $this->vision,
            'icon'       => is_null($this->icon) ? null : new FileResource($this->icon),
            'address'    => is_null($this->address) ? null : new AddressResource($this->address),
            'mission'    => $this->mission,
            'facebook'   => $this->facebook,
            'linkedin'   => $this->linkedin,
            'instagram'  => $this->instagram,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
