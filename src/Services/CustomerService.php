<?php

namespace Basketin\Component\Customers\Services;

use Basketin\Component\Customers\Repositories\CustomerRepository;

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
}
