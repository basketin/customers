<?php

namespace Basketin\Filament\Customers\Resources\CustomerAddressResource\Pages;

use Basketin\Filament\Customers\Resources\CustomerAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerAddress extends EditRecord
{
    protected static string $resource = CustomerAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
