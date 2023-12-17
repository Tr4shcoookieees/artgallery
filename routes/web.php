<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::resource('artworks', ArtworkController::class)->only(['index', 'show']);

/**
 * Служебные роуты
 */
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('set.locale');

Route::fallback(function () {
    return view('errors.404');
});

require __DIR__.'/auth.php';
