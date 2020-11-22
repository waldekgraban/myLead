<?php

namespace App\Providers;

use App\Repositories\PriceRepository;
use App\Repositories\PriceRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Services\PriceService;
use App\Services\PriceServiceInterface;
use App\Services\ProductService;
use App\Services\ProductServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [
        ProductRepositoryInterface::class => ProductRepository::class,
        PriceRepositoryInterface::class   => PriceRepository::class,
        ProductServiceInterface::class    => ProductService::class,
        PriceServiceInterface::class      => PriceService::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
