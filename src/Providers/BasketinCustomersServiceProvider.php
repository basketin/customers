<?php

namespace Basketin\Component\Customers\Providers;

use Basketin\Component\Customers\Contracts\CustomerModel;
use Basketin\Component\Customers\Models\Customer;
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
        config([
            'auth.guards.basketin' => array_merge([
                'driver' => 'session',
                'provider' => 'basketin',
            ], config('auth.guards.basketin', [])),
        ]);

        config([
            'auth.providers.basketin' => array_merge([
                'driver' => 'eloquent',
                'model' => Customer::class,
            ], config('auth.providers.basketin', [])),
        ]);

        $this->app->bind(CustomerModel::class, Customer::class);

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
