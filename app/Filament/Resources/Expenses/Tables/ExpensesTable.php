<?php

namespace App\Filament\Resources\Expenses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ExpensesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category')
                    ->badge()
                    ->color('danger'),
                TextColumn::make('amount')
                    ->money('USD')
                    ->color('danger')
                    ->weight('bold'),
                TextColumn::make('date')
                    ->date()
                    ->sortable(),
                ImageColumn::make('img_link')
                    ->label('Expense Image')
                    ->disk('public'),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'office_rent' => 'Office Rent',
                        'utilities' => 'Utilities',
                        'software' => 'Software',
                        'marketing' => 'Marketing',
                        'travel' => 'Travel',
                        'salaries' => 'Salaries',
                        'equipment' => 'Equipment',
                        'other' => 'Other',
                    ]),
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
