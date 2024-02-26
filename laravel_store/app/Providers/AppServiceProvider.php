<?php

namespace App\Providers;

use App\View\Composer\CategoryComposer;
use App\View\Composer\CountryComposer;
use App\View\Composer\CurrencyComposer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CategoryComposer::class);
        $this->app->singleton(CountryComposer::class);
        $this->app->singleton(CurrencyComposer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(
            ['partials.category', 'partials.search', 'ads.create', 'ads.edit'],
            CategoryComposer::class
        );
        view()->composer(
            ['partials.search', 'ads.create', 'ads.edit'],
            CountryComposer::class
        );
        view()->composer(
            ['ads.create', 'ads.edit'],
            CurrencyComposer::class
        );
    }
}
