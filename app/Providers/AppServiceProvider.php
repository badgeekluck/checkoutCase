<?php

namespace App\Providers;

use App\Contracts\Services\Order\OrderService\OrderService;
use App\Contracts\Services\Order\OrderServiceInterface\OrderServiceInterface;
use App\Contracts\Services\Product\ProductService\ProductService;
use App\Contracts\Services\Product\ProductServiceInterface\ProductServiceInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\ProductRepository;
use App\Contracts\Services\Stock\StockService\StockService;
use App\Contracts\Services\Stock\StockServiceInterface\StockServiceInterface;
use App\Repositories\Stock\StockRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductServiceInterface::class, ProductRepository::class);
        $this->app->bind(ProductService::class, function ($app) {
            return new ProductService($app->make(ProductServiceInterface::class));
        });

        $this->app->bind(StockServiceInterface::class, StockRepository::class);
        $this->app->bind(StockService::class, function ($app){
            return new StockService($app->make(StockServiceInterface::class));
        });

        $this->app->bind(OrderServiceInterface::class, OrderRepository::class);
        $this->app->bind(OrderService::class, function ($app){
            return new OrderService($app->make(OrderServiceInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
