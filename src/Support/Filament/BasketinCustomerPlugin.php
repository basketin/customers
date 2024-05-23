<?php

namespace Basketin\Component\Customers\Support\Filament;

use Basketin\Component\Customers\Support\Filament\Resources\CustomerResource;
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
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
