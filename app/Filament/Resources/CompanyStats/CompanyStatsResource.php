<?php

namespace App\Filament\Resources\CompanyStats;

use App\Filament\Resources\CompanyStats\Pages\ManageCompanyStats;
use App\Models\CompanyStats;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
// use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CompanyStatsResource extends Resource
{
    protected static ?string $model = CompanyStats::class;

    protected static ?int $navigationSort = 2;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('video_link')
                    ->label('Video Link')
                    ->url()
                    ->required(),

                TextInput::make('projects_complete')
                    ->numeric()
                    ->required(),

                TextInput::make('years_of_experience')
                    ->numeric()
                    ->required(),

                TextInput::make('team_members')
                    ->numeric()
                    ->required(),

                TextInput::make('total_awards')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('video_link')
                    ->label('Video')->toggleable()
                    ->url(fn($record) => $record->video_link)
                    ->openUrlInNewTab(),

                TextColumn::make('projects_complete')->toggleable(),

                TextColumn::make('years_of_experience')->toggleable()
                    ->label('Experience'),

                TextColumn::make('team_members')->toggleable()
                    ->label('Team'),

                TextColumn::make('total_awards')->toggleable()
                    ->label('Awards'),

                TextColumn::make('created_at')->toggleable()
                    ->dateTime(),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => ManageCompanyStats::route('/'),
        ];
    }
}
