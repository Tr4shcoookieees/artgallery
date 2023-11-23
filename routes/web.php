<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('catalog')->get('/', CatalogController::class)->name('catalog');

Route::fallback(function () {
    return view('errors.404');
});
