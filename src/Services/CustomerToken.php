<?php

namespace Basketin\Component\Customers\Services;

class CustomerToken
{
    public function __construct(
        private $customer
    ) {
    }

    public function __toString()
    {
        return $this->customer;
    }

    public function createToken()
    {
        return $this->customer->createToken('BASKETIN_API')->plainTextToken;
    }
}
