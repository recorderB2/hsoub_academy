<?php

namespace App\Providers;

use App\Repositories\Ads\AdInterface;
use App\Repositories\Ads\AdRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Favorites\FavoriteInterface;
use App\Repositories\Favorites\FavoriteRepository;
use App\Repositories\Comments\CommentInterface;
use App\Repositories\Comments\CommentRepository;

class RepositoryServiceProveider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AdInterface::class,
            AdRepository::class
        );
        $this->app->bind(
            FavoriteInterface::class,
            FavoriteRepository::class
        );
        $this->app->bind(
            CommentInterface::class,
            CommentRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
