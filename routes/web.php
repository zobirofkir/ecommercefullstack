<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ShopeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/shops', [ShopeController::class, 'index'])->name('shops.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');