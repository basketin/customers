<?php

namespace Basketin\Component\Customers\Services;

use Basketin\Component\Customers\Contracts\CustomerModel;

class CustomerProfileAddressesService
{
    public function __construct(
        private CustomerModel $customerModel,
    ) {
    }

    public function all()
    {
        return $this->customerModel->addresses;
    }

    public function create($label, $countryCode, $cityId, $postcode, $streetLine1, $phoneNumber, $streetLine2 = null, $isMain = null)
    {
        return $this->customerModel->addresses()->create([
            'label' => $label,
            'country_code' => $countryCode,
            'city_id' => $cityId,
            'postcode' => $postcode,
            'street_line_1' => $streetLine1,
            'street_line_2' => $streetLine2,
            'phone_number' => $phoneNumber,
            'is_main' => $isMain,
        ]);
    }
}
