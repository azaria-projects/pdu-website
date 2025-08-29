<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::prefix('services')->group(function () {
    Route::controller(ServiceController::class)->group(function () {
        Route::get('/', 'index')->name('services.index');
    });
});

Route::prefix('careers')->group(function () {
    Route::controller(CareerController::class)->group(function () {
        Route::get('/', 'index')->name('careers.index');
    });
});

Route::prefix('company')->group(function () {
    Route::controller(CompanyController::class)->group(function () {
        Route::get('/', 'index')->name('companies.index');
    });
});