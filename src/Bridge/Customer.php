<?php

namespace Basketin\Component\Customers\Bridge;

use Illuminate\Support\Facades\Hash;

class Customer
{
    public function __construct(
        private $customer
    ) {
    }

    public function customerData()
    {
        return $this->customer;
    }

    public function createToken()
    {
        return $this->customer->createToken('BASKETIN_API')->plainTextToken;
    }

    public function changePassword($password, $confirmPassword)
    {
        if ($password !== $confirmPassword) {
            throw new \Exception('The new password does not match');
        }

        return $this->customer->update([
            'password' => Hash::make($password),
        ]);
    }
}
