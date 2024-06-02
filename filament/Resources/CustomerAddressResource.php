<?php

namespace Basketin\Filament\Customers\Resources;

use Basketin\Component\Customers\Models\Customer;
use Basketin\Component\Customers\Models\CustomerAddress;
use Basketin\Filament\Customers\Resources\CustomerAddressResource\Pages\CreateCustomerAddress;
use Basketin\Filament\Customers\Resources\CustomerAddressResource\Pages\EditCustomerAddress;
use Basketin\Filament\Customers\Resources\CustomerAddressResource\Pages\ListCustomerAddresses;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomerAddressResource extends Resource
{
    protected static ?string $model = CustomerAddress::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Customers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('customer_id')
                    ->label('Customer')
                    ->required()
                    ->options(Customer::all()->pluck('full_name', 'id'))
                    ->searchable(),
                TextInput::make('label')
                    ->label('Label')
                    ->required(),
                TextInput::make('country_code')
                    ->label('Country Code')
                    ->required(),
                TextInput::make('city_id')
                    ->label('City Id')
                    ->required(),
                TextInput::make('postcode')
                    ->label('Postcode'),
                TextInput::make('street_line_1')
                    ->label('Street Line 1')
                    ->required(),
                TextInput::make('street_line_2')
                    ->label('Street Line 2'),
                TextInput::make('phone_number')
                    ->label('Phone Number')
                    ->required()
                    ->tel(),
                Toggle::make('is_main')
                    ->label('Is Main'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')->label('Label'),
                TextColumn::make('customer.full_name')->label('Customer'),
                TextColumn::make('street_line_1')->label('Street Line 1'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCustomerAddresses::route('/'),
            'create' => CreateCustomerAddress::route('/create'),
            'edit' => EditCustomerAddress::route('/{record}/edit'),
        ];
    }
}
