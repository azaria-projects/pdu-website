<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AuthMiddleware;

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ComCodeController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\TestimonyController;
use App\Http\Controllers\Api\StatisticController;
use App\Http\Controllers\Api\ServiceStatisticController;

Route::post('/login', [UserController::class, 'login'])->name('login');

// Route::apiResource('news', NewsController::class)->parameters(['news' => 'dat']);
// Route::apiResource('users', UserController::class)->parameters(['users' => 'dat']);
// Route::apiResource('files', FileController::class)->parameters(['files' => 'dat']);
// Route::apiResource('codes', ComCodeController::class)->parameters(['codes' => 'dat']);
// Route::apiResource('address', AddressController::class)->parameters(['address' => 'dat']);
// Route::apiResource('services', ServiceController::class)->parameters(['services' => 'dat']);
// Route::apiResource('partners', PartnerController::class)->parameters(['partners' => 'dat']);
// Route::apiResource('companies', CompanyController::class)->parameters(['companies' => 'dat']);
// Route::apiResource('statistics', StatisticController::class)->parameters(['statistics' => 'dat']);
// Route::apiResource('testimonies', TestimonyController::class)->parameters(['testimonies' => 'dat']);
// Route::apiResource('service-stats', ServiceStatisticController::class)->parameters(['service-stats' => 'dat']);

// Route::post('/codes/careers-reset', [ComCodeController::class, 'resetCareersCode'])->name('codes.reset-careers');
// Route::post('/codes/company-reset', [ComCodeController::class, 'resetCompanyCode'])->name('codes.reset-company');

// Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware([AuthMiddleware::class])->group(function () {
    Route::apiResource('news', NewsController::class)->parameters(['news' => 'dat']);
    Route::apiResource('users', UserController::class)->parameters(['users' => 'dat']);
    Route::apiResource('files', FileController::class)->parameters(['files' => 'dat']);
    Route::apiResource('codes', ComCodeController::class)->parameters(['codes' => 'dat']);
    Route::apiResource('address', AddressController::class)->parameters(['address' => 'dat']);
    Route::apiResource('services', ServiceController::class)->parameters(['services' => 'dat']);
    Route::apiResource('partners', PartnerController::class)->parameters(['partners' => 'dat']);
    Route::apiResource('companies', CompanyController::class)->parameters(['companies' => 'dat']);
    Route::apiResource('statistics', StatisticController::class)->parameters(['statistics' => 'dat']);
    Route::apiResource('testimonies', TestimonyController::class)->parameters(['testimonies' => 'dat']);
    Route::apiResource('service-stats', ServiceStatisticController::class)->parameters(['service-stats' => 'dat']);

    Route::post('/codes/careers-reset', [ComCodeController::class, 'resetCareersCode'])->name('codes.reset-careers');
    Route::post('/codes/company-reset', [ComCodeController::class, 'resetCompanyCode'])->name('codes.reset-company');

    Route::post('/logout', [UserController::class, 'logout']);
});



