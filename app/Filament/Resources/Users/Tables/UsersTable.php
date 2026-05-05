<?php

namespace App\Filament\Resources\Users\Tables;

use App\Models\User;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->description(fn(User $record): string => $record->email)
                    ->label('NAME')
                    ->searchable(),

                TextColumn::make('position')
                    ->description(fn(User $record): string => "Role: {$record->role}")
                    ->label('POSITION'),

                TextColumn::make('department')
                    ->label('DEPARTMENT'),

            ])
            ->filters([
                SelectFilter::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'super_admin' => 'Super Admin',
                        'project_manager' => 'Project Manager',
                        'account_manager' => 'Account Manager',
                        'marketing_executive' => 'Marketing Executive',
                        'viewer' => 'Viewer',
                        'client_service' => 'Client Service',
                    ]),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
