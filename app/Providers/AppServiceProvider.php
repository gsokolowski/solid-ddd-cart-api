<?php

namespace App\Providers;

use App\Domain\Catalog\ProductRepositoryInterface;
use App\Infrastructure\Persistence\EloquentProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class,
        );
    }

    public function boot(): void
    {
        //
    }
}