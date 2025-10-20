<?php

namespace App\Http\Collections;

use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NewsCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => NewsResource::collection($this->collection),
            'meta' => [
                'total'        => $this->total(),
                'per_page'     => $this->perPage(),
                'last_page'    => $this->lastPage(),
                'current_page' => $this->currentPage(),
            ],
            'links' => [
                'first' => $this->url(1),
                'last'  => $this->url($this->lastPage()),
                'prev'  => $this->previousPageUrl(),
                'next'  => $this->nextPageUrl(),
            ],
        ];
    }
}
