<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::resource('artworks', ArtworkController::class)->only('index', 'show');
Route::resource('artworks', ArtworkController::class)->only('store', 'edit', 'update', 'destroy')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('author', AuthorController::class)->only('index', 'store', 'show', 'update', 'destroy');

    Route::resource('order', OrderController::class)->only('index', 'create', 'store');
    Route::resource('order', OrderController::class)->middleware('admin')->only('edit', 'destroy', 'update');

    Route::prefix('/admin')->name('admin.')->controller(AdminController::class)->middleware('admin')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/customers', 'customers')->name('customers');
        Route::get('/users', 'users')->name('users');
        Route::get('/authors', 'authors')->name('authors');
    });
});


/**
 * Служебные роуты
 */
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
}
)->name('set.locale');

Route::fallback(function () {
    return view('errors.404');
});

Route::get('/pgsql', function () {
    var_dump(
        DB::connection()
    );
});

require __DIR__ . '/auth.php';
