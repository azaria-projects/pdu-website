<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

if (! function_exists('APIResponse')) 
{
    function APIResponse($status, $message, $data, $code) : JsonResponse 
    {
        return response()->json([
            'status'   => $status,
            'message'  => $message,
            'response' => $data,
        ], $code);
    }
}
