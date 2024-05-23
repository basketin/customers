<?php

namespace Basketin\Component\Customers\Models;

use Basketin\Component\Customers\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'label',
        'country_code',
        'city_id',
        'postcode',
        'street_line_1',
        'street_line_2',
        'phone_number',
        'is_main',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
