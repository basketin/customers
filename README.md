<p align="center"><a href="#" target="_blank"><img src="./cover.svg"/></a></p>

<p align="center">
  <a href="https://packagist.org/packages/basketin/customers" target="_blank"><img src="https://img.shields.io/static/v1?label=Packagist&message=basketin/customers&color=blue&logo=packagist&logoColor=white" alt="Source"></a>
  <a href="https://packagist.org/packages/basketin/customers" target="_blank"><img src="https://poser.pugx.org/basketin/customers/v" alt="Packagist Version"></a>
</p>

# Basketin Customers

The customers' module lets you register and manage customers and support Filament.

## Documentation

### Installation

Install via composer.

```bash
composer require basketin/customers
```

You need to migrate the package tables.

```bash
php artisan migrate
```

### How to use

#### Create New Customer

You can create a new customer using the following code.

```php
<?php

use Basketin\Component\Customers\Facades\Customer;

$customer = Customer::createNewCustomer(
    first_name: 'Karim',
    last_name: 'Mohamed',
    email: 'karim@mail.com',
    phone: '01234567899',
    password: 'password',
); // Return Customer Profile;
```

#### Customer Login

```php
<?php

use Basketin\Component\Customers\Facades\Customer;

$customer = Customer::login('karim@mail.com', 'password') // Return Customer Profile;
```

#### Get Customer Via Sanctum

Using the following code, you can get a customer profile by sanctum token from `$request`.

```php
$customer = $request->customerProfile();
```

#### Get Model

```php
$customer->getModel();
```

#### Customer Update Data

```php
$customer->updateData(
    phone: '01234567809',
);
```

#### Customer Change Password

```php
$customer->changePassword($password, $confirmPassword);
```

#### Customer Addresses

```php
$customer->addresses()->all();
```

#### Customer Create New Address

```php
$customer->addresses()->create(
    $label,
    $countryCode,
    $cityId,
    $postcode,
    $streetLine1,
    $phoneNumber,
    $streetLine2 = null,
    $isMain = null
);
```

## Filament Support

You can add customer management to the Filament panel using the following code.

```php
use Basketin\Filament\Customers\BasketinCustomerPlugin;

...
->plugins([
    ...
    new BasketinCustomerPlugin(),
    ...
]),
...
```

## Contributing

Thank you for considering contributing to this package! Be one of the Store team.

## License

This package is an open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
