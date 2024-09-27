<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TripPackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tours', function () {
    return view('tour');
})->name('landing.tour');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('trips', TripController::class);
    Route::resource('trip_packages', TripPackageController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('social_media', SocialMediaController::class);
    Route::resource('contacts', ContactController::class);
});

require __DIR__ . '/auth.php';
