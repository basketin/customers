<?php

namespace Basketin\Component\Customers\Support\Filament\Resources\CustomerAddressResource\Pages;

use Basketin\Component\Customers\Support\Filament\Resources\CustomerAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomerAddresses extends ListRecords
{
    protected static string $resource = CustomerAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
