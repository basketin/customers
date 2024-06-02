<?php

namespace Basketin\Component\Customers\Services;

use Basketin\Component\Customers\Contracts\CustomerModel;
use Basketin\Component\Customers\Services\CustomerProfileAddressesService;
use Illuminate\Support\Facades\Hash;

class CustomerProfileService
{
    public function __construct(
        private CustomerModel $customerModel,
    ) {
    }

    public function getModel()
    {
        return $this->customerModel;
    }

    public function updateData(...$data)
    {
        if (isset($data['password']))
            $data['password'] = Hash::make($data['password']);

        return $this->customerModel->update($data);
    }

    public function createToken()
    {
        return $this->customerModel->createToken('BASKETIN_API')->plainTextToken;
    }

    public function changePassword($password, $confirmPassword)
    {
        if ($password !== $confirmPassword) {
            throw new \Exception('The new password does not match');
        }

        return $this->customerModel->update([
            'password' => Hash::make($password),
        ]);
    }

    public function addresses()
    {
        return new CustomerProfileAddressesService($this->customerModel);
    }
}
