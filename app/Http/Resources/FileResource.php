<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'size'       => $this->size . ' KB',
            'type'       => $this->type,
            'path'       => Storage::disk('public')->url($this->path),
            'extension'  => $this->extension,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
