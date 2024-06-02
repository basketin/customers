<?php

namespace Basketin\Filament\Customers;

use Basketin\Filament\Customers\Resources\CustomerAddressResource;
use Basketin\Filament\Customers\Resources\CustomerResource;
use Filament\Contracts\Plugin;
use Filament\Panel;

class BasketinCustomerPlugin implements Plugin
{
    public function getId(): string
    {
        return 'basketin-customer';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->resources([
                CustomerResource::class,
                CustomerAddressResource::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
