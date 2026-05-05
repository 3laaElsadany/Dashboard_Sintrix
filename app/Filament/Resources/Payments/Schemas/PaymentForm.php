<?php

namespace App\Filament\Resources\Payments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
// use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                
                        TextInput::make('client_name')->required(),
                        TextInput::make('amount')
                            ->numeric()
                            ->prefix('$')
                            ->required(),
                        Select::make('method')
                            ->options([
                                'cash' => 'Cash',
                                'bank_transfer' => 'Bank Transfer',
                                'credit_card' => 'Credit Card',
                                'cheque' => 'Cheque',
                            ])->required()->native(false),
                        DatePicker::make('payment_date')
                            ->default(now())
                            ->required(),
                        TextInput::make('reference_number')
                            ->label('Ref / Check Number'),
                        FileUpload::make('img_link')
                            ->label('Payment Image')
                            ->disk('public')
                            ->directory('payments-photos')
                            ->image()
                            ->columnSpanFull(),
                
            ]);
    }
}
