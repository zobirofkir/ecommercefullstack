<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayoutConstroller;
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

