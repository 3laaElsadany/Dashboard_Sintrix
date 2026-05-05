<?php

namespace App\Filament\Resources\ReportDocuments\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
// use Filament\Actions\EditAction;
// use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReportDocumentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('document_name')
                    ->label('Document Name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('document_type')
                    ->label('Type')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pdf' => 'danger',
                        'excel' => 'success',
                        'report' => 'warning',
                        default => 'gray',
                    }),

                TextColumn::make('file_size')
                    ->label('Size')
                    ->badge()
                    ->color('gray'),
                TextColumn::make('created_at')
                    ->label('Date')
                    ->date('Y-m-d')
                    ->color('gray')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('By')
                    ->icon('heroicon-m-user')
                    ->color('primary')
                    ->placeholder('Unknown')
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('info')
                    ->url(fn($record) => asset('storage/' . $record->file_path))
                    ->openUrlInNewTab(),

                DeleteAction::make()
                    ->label('Delete')
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
