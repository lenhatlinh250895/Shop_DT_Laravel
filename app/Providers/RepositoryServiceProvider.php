<?php

namespace App\Providers;

use App\shop\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\shop\Products\Repositories\ProductRepository;
use App\shop\ProductTypes\Repositories\Interfaces\ProductTypeRepositoryInterface;
use App\shop\ProductTypes\Repositories\ProductTypeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            ProductTypeRepositoryInterface::class,
            ProductTypeRepository::class
        );
    }
}