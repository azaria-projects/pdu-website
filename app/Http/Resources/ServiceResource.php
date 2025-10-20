<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\FileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'icon'        => $this->icon,
            'status'      => $this->status,
            'image'       => is_null($this->file) ? null : new FileResource($this->file),
            'description' => $this->description,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at
        ];
    }
}
