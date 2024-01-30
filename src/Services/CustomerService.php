<?php

namespace Basketin\Component\Customers\Services;

use Basketin\Component\Customers\Bridge\Customer;
use Basketin\Component\Customers\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Auth;

class CustomerService
{
    public function __construct(
        private CustomerRepository $customerRepository
    ) {
    }

    public function createNewCustomer(...$data)
    {
        if ($this->customerRepository->checkExistsCustomer($data['email'], $data['phone'])) {
            throw new \Exception('The customer is already registered');
        }

        return $this->customerRepository->createNewCustomer(...$data);
    }

    public function login($email, $password, $remember = false)
    {
        if (Auth::guard('basketin')->attempt(['email' => $email, 'password' => $password], $remember)) {
            return new Customer(Auth::guard('basketin')->user());
        }

        throw new \Exception('The authentication data is incorrect');
    }

    public function profile($customer)
    {
        return new Customer($customer);
    }
}
