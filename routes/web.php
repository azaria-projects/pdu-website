<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('web.index');
    Route::get('/careers', 'careers')->name('web.careers.index');
    Route::get('/company', 'company')->name('web.companies.index');
    Route::get('/services', 'services')->name('web.services.index');
});

Route::prefix('admin')->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/', 'index')->name('admin.index');
        Route::get('/news', 'news')->name('admin.news');
        Route::get('/codes', 'codes')->name('admin.codes');
        Route::get('/files', 'files')->name('admin.files');
        Route::get('/users', 'users')->name('admin.users');
        Route::get('/careers', 'careers')->name('admin.careers');
        Route::get('/services', 'services')->name('admin.services');
        Route::get('/partners', 'partners')->name('admin.partners');
        Route::get('/companies', 'companies')->name('admin.companies');
        Route::get('/statistics', 'statistics')->name('admin.statistics');
        Route::get('/testimonies', 'testimonies')->name('admin.testimonies');
    });
});