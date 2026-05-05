<?php

namespace App\Filament\Resources\Invoices\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class InvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('invoice_number')
                    ->default('INV-' . date('Y') . '-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT))
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('client_name')
                    ->required(),
                TextInput::make('amount')
                    ->numeric()
                    ->prefix('$')
                    ->required(),
                Select::make('status')
                    ->options([
                        'paid' => 'Paid',
                        'pending' => 'Pending',
                        'overdue' => 'Overdue',
                    ])
                    ->required()
                    ->native(false),
                FileUpload::make('img_link')
                    ->label('Invoice Image')
                    ->disk('public')
                    ->directory('invoices-photos')
                    ->visibility('public')
                    ->image()
                    ->columnSpanFull()

            ]);
    }
}
