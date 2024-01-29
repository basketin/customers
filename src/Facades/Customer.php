<?php

namespace Basketin\Component\Customers\Facades;

use Illuminate\Support\Facades\Facade;

class Customer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'basketin.customers.customer';
    }
}
