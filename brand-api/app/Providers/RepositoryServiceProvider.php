<?php

namespace App\Providers;

use App\Contracts\BrandRepository;
use App\Repositories\BrandRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(BrandRepository::class, BrandRepositoryEloquent::class);
    }
}
