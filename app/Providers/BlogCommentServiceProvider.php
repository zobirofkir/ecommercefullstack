<?php

namespace App\Providers;

use App\Services\Services\BlogCommentService;
use Illuminate\Support\ServiceProvider;

class BlogCommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('BlogCommentService', function ($app) {
            return new BlogCommentService();
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
