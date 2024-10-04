<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeroBackgroundController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\TripImageController;
use App\Http\Controllers\TripPackageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing.index');
Route::get('/tours', [LandingController::class, 'tours'])->name('landing.tour');
Route::get('/tour/{slug}', [LandingController::class, 'tour_show'])->name('landing.tour.show');
Route::get('/gallery', [LandingController::class, 'galleries'])->name('landing.gallery');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('trip/{trip}/set_packages', [TripController::class, 'setpackage'])->name('trip.setpackage');
    Route::get('trip/{trip}/set_images', [TripController::class, 'setimage'])->name('trip.setimage');
    Route::delete('trip/{trip}/delete_images', [TripController::class, 'deleteimage'])->name('trip.deleteimage');
    Route::resource('trips', TripController::class);
    Route::resource('trip_packages', TripPackageController::class);
    Route::resource('packages', PackageController::class);
    Route::resource('social_media', SocialMediaController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('hero_backgrounds', HeroBackgroundController::class);
    Route::delete('galleries/destroy_multiple', [GalleryController::class, 'destroy_multiple'])->name('galleries.destroy_multiple');
    Route::resource('galleries', GalleryController::class);
    Route::resource('company_profile', CompanyProfileController::class);
    Route::resource('trip_images', TripImageController::class);
    Route::resource('categories', CategoryController::class);
});

require __DIR__ . '/auth.php';
