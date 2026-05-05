<?php

namespace App\Filament\Resources\Salaries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SalaryForm
{

    public static function calculateNetSalary($set, $get)
    {
        $base = (float) $get('base_salary');
        $bonus = (float) $get('bonus');
        $deductions = (float) $get('deductions');

        $set('net_salary', $base + $bonus - $deductions);
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('employee_name')
                    ->required(),

                Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                    ])->required(),
                TextInput::make('base_salary')
                    ->numeric()->required()
                    ->prefix('$')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($set, $get) => self::calculateNetSalary($set, $get)),
                
                    TextInput::make('bonus')
                    ->numeric()->required()
                    ->prefix('$')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($set, $get) => self::calculateNetSalary($set, $get)),

                TextInput::make('deductions')
                    ->numeric()->required()
                    ->prefix('$')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($set, $get) => self::calculateNetSalary($set, $get)),

                TextInput::make('net_salary')
                    ->label('Net Salary')
                    ->numeric()
                    ->prefix('$')
                    ->readOnly()
                    ->extraInputAttributes(['class' => 'font-bold text-success-600']),

                FileUpload::make('img_link')
                    ->label('Salary Image')
                    ->disk('public')
                    ->directory('salaries-photos')
                    ->image()
                    ->columnSpanFull(),
            ]);
    }
}
