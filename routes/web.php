<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mediaView', function () {
    return view('media');
});

Route::get('/dashboard', function () {
    return view('dashboard');
    // return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'home'])->middleware(['auth'])->name('home');

Route::middleware('auth')->group(function () {
});

Route::resource('media', MediaController::class);
Route::resource('platform', PlatformController::class);
Route::resource('user', UserController::class);
// Route::resource('collection', CollectionController::class);
// Route::resource('watchlist', WatchlistController::class);
// Route::resource('category', CategoryController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
