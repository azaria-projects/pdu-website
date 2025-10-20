<?php

namespace App\Providers;

use Throwable;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ExceptionServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        app('Illuminate\Contracts\Debug\ExceptionHandler')->renderable(
            function (Throwable $th, $request) {
                // if (! $request->expectsJson()) {
                //     return null;
                // }

                // if ($th instanceof QueryException) {
                //     return apiResponse(false, 'Database error', null, 500);
                // }

                // if ($th instanceof ValidationException) {
                //     return apiResponse(false, $th->errors(), null, 422);
                // }

                // if ($th instanceof NotFoundHttpException) {
                //     return apiResponse(false, 'Resource not found', null, 404);
                // }

                return apiResponse(false, $th->getMessage(), null, 501);
            }
        );
    }
}
