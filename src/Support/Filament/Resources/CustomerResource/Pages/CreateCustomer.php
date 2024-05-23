<?php

namespace Basketin\Component\Customers\Support\Filament\Resources\CustomerResource\Pages;

use Basketin\Component\Customers\Support\Filament\Resources\CustomerResource;
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
