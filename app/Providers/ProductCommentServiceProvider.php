<?php

namespace App\Providers;

use App\Services\Services\ProductCommentService;
use Illuminate\Support\ServiceProvider;

class ProductCommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('ProductCommentService', function ($app) {
            return new ProductCommentService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
