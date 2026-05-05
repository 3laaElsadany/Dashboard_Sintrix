<?php

namespace App\Filament\Resources\EmpoweringBusinessThroughSmartVertexWaves;

use App\Filament\Resources\EmpoweringBusinessThroughSmartVertexWaves\Pages\ManageEmpoweringBusinessThroughSmartVertexWaves;
use App\Models\EmpoweringBusinessThroughSmartVertexWave;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
// use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmpoweringBusinessThroughSmartVertexWaveResource extends Resource
{
    protected static ?string $modelLabel = 'Empowering Business';
    
    protected static ?int $navigationSort = 5;
    protected static ?string $pluralModelLabel = 'Empowering Business';

    protected static ?string $model = EmpoweringBusinessThroughSmartVertexWave::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Progress Bars Section
                Section::make('Progress Bars')
                    ->columns(3)
                    ->schema([
                        TextInput::make('efficiency_rate')
                            ->numeric()
                            ->label('Efficiency (%)')
                            ->required(),
                        TextInput::make('performance_rate')
                            ->numeric()
                            ->label('Performance (%)')
                            ->required(),
                        TextInput::make('innovation_rate')
                            ->numeric()
                            ->label('Innovation (%)')
                            ->required(),
                    ]),

                // Stats Section
                Section::make('Stats Counters')
                    ->columns(3)
                    ->schema([
                        TextInput::make('active_clients')
                            ->label('Active Clients (e.g. 200+)')
                            ->required(),
                        TextInput::make('client_satisfaction')
                            ->label('Satisfaction (e.g. 98%)')
                            ->required(),
                        TextInput::make('industries_served')
                            ->label('Industries (e.g. 15+)')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('efficiency_rate')
                    ->numeric()
                    ->suffix('%')
                    ->label('Efficiency')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('performance_rate')
                    ->numeric()
                    ->suffix('%')
                    ->label('Performance')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('innovation_rate')
                    ->numeric()
                    ->suffix('%')
                    ->label('Innovation')
                    ->sortable()
                    ->toggleable(),

                TextColumn::make('active_clients')
                    ->label('Active Clients')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('client_satisfaction')
                    ->label('Satisfaction')
                    ->toggleable(),

                TextColumn::make('industries_served')
                    ->label('Industries')
                    ->toggleable(),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Last Update')
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => ManageEmpoweringBusinessThroughSmartVertexWaves::route('/'),
        ];
    }
}
