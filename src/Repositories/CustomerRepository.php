<?php

namespace Basketin\Component\Customers\Repositories;

use Basketin\Component\Customers\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerRepository
{
    public function createNewCustomer($first_name, $last_name, $email, $phone, $password = null)
    {
        return Customer::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'password' => $password ? Hash::make($password) : null,
        ]);
    }

    public function checkExistsCustomer($email, $phone)
    {
        return Customer::where('email', $email)
            ->orWhere('phone', $phone)
            ->exists();
    }
}
