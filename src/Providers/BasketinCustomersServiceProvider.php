<?php

namespace Basketin\Component\Customers\Providers;

use Basketin\Component\Customers\Services\CustomerService;
use Illuminate\Support\ServiceProvider;

class BasketinCustomersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('basketin.customers.customer', CustomerService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }
    }
}
