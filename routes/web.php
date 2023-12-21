<?php

use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::resource('artworks', ArtworkController::class)->only(['index', 'show']);

Route::post('/order', function () {
    dd(request()->all());
})->name('order.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('author', AuthorController::class)->only('index', 'store', 'show', 'update', 'destroy');
});

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

require __DIR__ . '/auth.php';
