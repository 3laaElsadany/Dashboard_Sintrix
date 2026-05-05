<?php

namespace App\Filament\Resources\Salaries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SalariesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('employee_name')
                    ->label('Employee')
                    ->searchable(),
                TextColumn::make('base_salary')
                    ->money('USD'),
                TextColumn::make('bonus')
                    ->money('USD')
                    ->color('success'),
                TextColumn::make('deductions')
                    ->money('USD')
                    ->color('danger'),
                TextColumn::make('net_salary')
                    ->money('USD')
                    ->weight('bold')
                    ->color('primary'),
                TextColumn::make('status'),
                ImageColumn::make('img_link')
                    ->label('Salary Image')->disk('public')
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
