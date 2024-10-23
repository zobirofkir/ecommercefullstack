<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopeController;
use Illuminate\Support\Facades\Route;

/**
 * Home Route
 */
Route::get('/', [HomeController::class, 'index'])->name('home.index');

/**
 * Blog Route
 */
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');

/**
 * Shope Route
 */
Route::get('/shops', [ShopeController::class, 'index'])->name('shops.index');

/**
 * Contact Route
 */
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

/**
 * Authenticated Routes
 */
Route::middleware('auth')->group(function () {
    /**
     * Get the authenticated user's profile
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    /**
     * Update the authenticated user's profile
     */
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    /**
     * Delete the authenticated user's profile
     */
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
