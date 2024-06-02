<?php

namespace Basketin\Filament\Customers\Resources\CustomerAddressResource\Pages;

use Basketin\Filament\Customers\Resources\CustomerAddressResource;
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
