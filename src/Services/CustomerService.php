<?php

namespace Basketin\Component\Customers\Services;

use Basketin\Component\Customers\Contracts\CustomerModel;
use Basketin\Component\Customers\Exceptions\AuthenticationDataIncorrectException;
use Basketin\Component\Customers\Exceptions\CustomerAlreadyRegisteredException;
use Basketin\Component\Customers\Services\CustomerProfileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    public function __construct(
        private CustomerModel $customerModel
    ) {}

    public function createNewCustomer(...$data)
    {
        if ($this->customerModel->where('email', $data['email'])->orWhere('phone', $data['phone'])->exists()) {
            throw new CustomerAlreadyRegisteredException('The customer is already registered');
        }

        $customer = $this->customerModel->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'] ? Hash::make($data['password']) : null,
        ]);

        return $this->profile($customer);
    }

    public function login($email, $password, $remember = false)
    {
        if (Auth::guard('basketin')->attempt(['email' => $email, 'password' => $password], $remember)) {
            return $this->profile(Auth::guard('basketin')->user());
        }

        throw new AuthenticationDataIncorrectException('The authentication data is incorrect');
    }

    public function loginByPhone($phone, $password, $remember = false)
    {
        if (Auth::guard('basketin')->attempt(['phone' => $phone, 'password' => $password], $remember)) {
            return $this->profile(Auth::guard('basketin')->user());
        }

        throw new AuthenticationDataIncorrectException('The authentication data is incorrect');
    }

    public function profile(CustomerModel $customer)
    {
        return new CustomerProfileService($customer);
    }
}
