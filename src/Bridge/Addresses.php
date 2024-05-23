<?php

namespace Basketin\Component\Customers\Bridge;

class Addresses
{
    public function __construct(
        private $customer
    ) {
    }

    public function all()
    {
        return $this->customer->addresses()->get();
    }

    public function create($label, $countryCode, $cityId, $postcode, $streetLine1, $phoneNumber, $streetLine2 = null, $isMain = null)
    {
        return $this->customer->addresses()->create([
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
