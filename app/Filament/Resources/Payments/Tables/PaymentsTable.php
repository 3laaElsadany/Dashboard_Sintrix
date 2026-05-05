<?php

namespace App\Filament\Resources\Payments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentsTable
{
    protected static ?string $navigationGroup = 'Finance';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?int $navigationSort = 2;
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('client_name')->searchable(),
                TextColumn::make('amount')
                    ->money('USD')
                    ->color('success')
                    ->weight('bold'),
                TextColumn::make('method')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('payment_date')
                    ->date()
                    ->sortable(),
                ImageColumn::make('img_link')
                    ->label('Payment Image')->disk('public')
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
