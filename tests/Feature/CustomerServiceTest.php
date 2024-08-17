<?php

use Basketin\Component\Customers\Exceptions\AuthenticationDataIncorrectException;
use Basketin\Component\Customers\Exceptions\CustomerAlreadyRegisteredException;
use Basketin\Component\Customers\Facades\Customer;

it('new customer', function () {

    $customer = Customer::createNewCustomer(
        first_name: 'Karim',
        last_name: 'Mohamed',
        email: 'karim@mail.com',
        phone: '01234567899',
        password: 'password',
    );

    expect($customer->getModel())->toMatchArray([
        'first_name' => 'Karim',
        'last_name' => 'Mohamed'
    ]);
});

it('checks if the customer exists in creating a new', function () {
    Customer::createNewCustomer(
        first_name: 'Karim',
        last_name: 'Mohamed',
        email: 'karim@mail.com',
        phone: '01234567899',
        password: 'password',
    );

    Customer::createNewCustomer(
        first_name: 'Karim',
        last_name: 'Mohamed',
        email: 'karim@mail.com',
        phone: '01234567899',
        password: 'password',
    );
})->throws(CustomerAlreadyRegisteredException::class);


it('login by email', function () {
    Customer::createNewCustomer(
        first_name: 'Karim',
        last_name: 'Mohamed',
        email: 'karim@mail.com',
        phone: '01234567899',
        password: 'password',
    );

    $customer = Customer::login('karim@mail.com', 'password');

    expect($customer->getModel())->toMatchArray([
        'first_name' => 'Karim',
        'last_name' => 'Mohamed'
    ]);
});

it('login by phone', function () {
    Customer::createNewCustomer(
        first_name: 'Karim',
        last_name: 'Mohamed',
        email: 'karim@mail.com',
        phone: '01234567899',
        password: 'password',
    );

    $customer = Customer::loginByPhone('01234567899', 'password');

    expect($customer->getModel())->toMatchArray([
        'first_name' => 'Karim',
        'last_name' => 'Mohamed'
    ]);
});

it('login with incorrect data', function () {
    Customer::createNewCustomer(
        first_name: 'Karim',
        last_name: 'Mohamed',
        email: 'karim@mail.com',
        phone: '01234567899',
        password: 'password',
    );

    Customer::login('karim@mail.com', 'wordpass');
})->throws(AuthenticationDataIncorrectException::class);
