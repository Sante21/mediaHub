<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::resource('media', MediaController::class);
});

Route::get('/media/{id}/watchlist', [WatchlistController::class, 'addMedia'])->name('watchlist.addMedia');

Route::middleware('auth')->group(function () {
    Route::resource('platform', PlatformController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('collection', CollectionController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/media/{media}/reviews', [ReviewController::class, 'index'])->name('media.reviews');
});

Route::middleware('auth')->group(function () {
    Route::post('media/{media}/reviews', [ReviewController::class, 'store'])->name('review.store');
});

Route::middleware('auth')->group(function () {
    Route::resource('user', UserController::class);
});

// Route::middleware('auth')->group(function () {
//     Route::resource('watchlist', WatchlistController::class);
// });

Route::middleware('auth')->group(function () {
    Route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist.index');
});

Route::middleware('auth')->group(function () {
    Route::post('/watchlist/{media}/add', [WatchlistController::class, 'addToWatchlist'])->name('watchlist.add');
});

Route::middleware('auth')->group(function () {
    Route::delete('/watchlist/{media}', [WatchlistController::class, 'remove'])->name('watchlist.remove');
});



// Route::resource('review', ReviewController::class);
// Route::resource('category', CategoryController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
