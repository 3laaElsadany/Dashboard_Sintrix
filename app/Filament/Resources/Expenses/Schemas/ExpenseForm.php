<?php

namespace App\Filament\Resources\Expenses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExpenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('description')
                    ->required()
                    ->placeholder('e.g. Office Rent'),
                Select::make('category')
                    ->options([
                        'office_rent' => 'Office Rent',
                        'utilities' => 'Utilities',
                        'software' => 'Software',
                        'marketing' => 'Marketing',
                        'travel' => 'Travel',
                        'salaries' => 'Salaries',
                        'equipment' => 'Equipment',
                        'other' => 'Other',
                    ])
                    ->required()
                    ->native(false),
                TextInput::make('amount')
                    ->numeric()
                    ->prefix('$')
                    ->required(),
                DatePicker::make('date')
                    ->default(now())
                    ->required(),
                FileUpload::make('img_link')
                    ->label('Expense Photo')
                    ->disk('public')
                    ->directory('expenses-photos')
                    ->image()
                    ->columnSpanFull(),

            ]);
    }
}
