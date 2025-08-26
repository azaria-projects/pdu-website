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
        Route::get('/mudlogging', 'mudlogging')->name('services.mudlogging');
        Route::get('/mwd-services', 'mwd')->name('services.mwd');
        Route::get('/plt-services', 'plt')->name('services.plt');
    });
});

Route::prefix('careers')->group(function () {
    Route::controller(CareerController::class)->group(function () {
        Route::get('/opportunities', 'opportunities')->name('careers.opportunities');
        Route::get('/descriptions', 'descriptions')->name('careers.descriptions');
    });
});

Route::prefix('company')->group(function () {
    Route::controller(CompanyController::class)->group(function () {
        Route::get('/overview', 'index')->name('companies.overview');
    });
});