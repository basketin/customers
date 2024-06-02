<?php

namespace Basketin\Filament\Customers\Resources\CustomerResource\Pages;

use Basketin\Filament\Customers\Resources\CustomerResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;

class CreateCustomer extends CreateRecord
{
    protected static string $resource = CustomerResource::class;

    protected function mutateFormDataBeforeCreate($data): array
    {
        $data['password'] = Hash::make($data['password']);

        return $data;
    }
}
