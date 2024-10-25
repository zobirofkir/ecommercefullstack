<?php

use App\Http\Controllers\BlogCommentController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductCommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
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
 * Route Show Blog
 */
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');

/**
 * Route Get Products
 */
Route::get('/shops', [ProductController::class, 'index'])->name('shops.index');

/**
 * Show Product Route
 */
Route::get('/shops/{slug}', [ProductController::class, 'show'])->name('shops.show');

/**
 * Contact Route
 */
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');


/**
 * Route Show Category
 */
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

/**
 * Get Blog Comments
 */
Route::get('/comments', [BlogCommentController::class, 'index'])->name('comments.index');

/**
 * Get Product Comments
 */
Route::get('/products/comments', [ProductCommentController::class, 'index'])->name('products.index');


/**
 * Search Route
 */
Route::get('/search', [SearchController::class, 'search'])->name('products.search');

/**
 * Authenticated Routes
 */
Route::middleware('auth')->group(function () {

    /**
     * Add To Cart
     */
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');

    /**
     * Show Cart
     */
    Route::get('/carts', [CartController::class, 'showCart'])->name('cart.show');
    
    /**
     * Remove From Cart
     */
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    
    /**
     * Checkout
     */
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    /**
     * Store Blog Comment
     */
    Route::post('/blogs/{blogId}/comments', [BlogCommentController::class, 'store'])->name('blogs.comments.store');

    /**<
     * Store Product Comment
     */
    Route::post('/products/{productId}/comments', [ProductCommentController::class, 'store'])->name('products.comments.store');

    /**
     * Delete Blog Comment
     */
    Route::delete('/blogs/comments/{comment}', [BlogCommentController::class, 'delete'])->name('blogs.comments.delete');  
      
    /**
     * Delete Product Comment
     */
    Route::delete('/products/comments/{comment}', [ProductCommentController::class, 'delete'])->name('products.comments.delete');  

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
