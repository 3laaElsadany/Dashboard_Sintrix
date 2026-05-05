<?php

namespace App\Filament\Resources\ClientProfits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Grid;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClientProfitsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('client_name')
                    ->label('Client Name')
                    ->weight('bold')
                    ->searchable(),

                TextColumn::make('projects_count'),
                
                TextColumn::make('revenue')
                    ->money('USD')
                    ->color('success'),

                TextColumn::make('cost')
                    ->money('USD')
                    ->color('danger'),

                TextColumn::make('net_profit')
                    ->label('Net Profit')
                    ->money('USD')
                    ->weight('bold'),

                TextColumn::make('margin')
                    ->label('Margin')
                    ->suffix('%')
                    ->badge()
                    ->color('primary'),

                ImageColumn::make('img_link')
                    ->label('Image')->disk('public'),
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
