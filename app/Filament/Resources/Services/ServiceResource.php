<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\Pages\ManageServices;
use App\Models\Service;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
// use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-wrench-screwdriver';

    protected static ?int $navigationSort = 6;
    protected static ?string $recordTitleAttribute = 'title1';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title1')->required()->label('Main Title'),
                Textarea::make('description1')->required()->label('Main Description'),
                FileUpload::make('img_url')
                    ->label('Image')
                    ->image()
                    ->required()
                    ->disk('cloudinary')
                    ->directory('services')
                    ->visibility('public')->columnSpanFull(),
                TextInput::make('title2')->label('Sub Title'),
                Textarea::make('description2')->label('Sub Description'),

                Repeater::make('technical')
                    ->label('Technical Features')
                    ->schema([
                        TextInput::make('feature')->label('Feature')
                    ])
                    ->columnSpanFull(),

                Repeater::make('key_services')
                    ->label('Key Services')
                    ->schema([
                        TextInput::make('service')->label('Service')
                    ])
                    ->columnSpanFull(),

                Repeater::make('how_we_work')
                    ->label('How We Work')
                    ->schema([
                        TextInput::make('title')->label('Step Title')->required(),
                        Textarea::make('description')->label('Step Description')->required(),
                    ])
                    ->columnSpanFull(),

                Repeater::make('benefits')
                    ->label('Benefits')
                    ->schema([
                        TextInput::make('benefit')->label('Benefit')
                    ])
                    ->columnSpanFull(),

                Repeater::make('technologies')
                    ->label('Technologies Used')
                    ->schema([
                        TextInput::make('technology')->label('Technology')
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title1')
            ->columns([
                TextColumn::make('title1')
                    ->label('Title 1')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('description1')
                    ->label('Description 1')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),

                ImageColumn::make('img_url')
                    ->label('Image')
                    ->disk('cloudinary')
                    ->square(),

                TextColumn::make('title2')
                    ->label('Title 2')
                    ->toggleable(),

                TextColumn::make('description2')
                    ->label('Description 2')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('technical')
                    ->label('Technical')
                    ->formatStateUsing(fn($state) => implode(', ', $state ?? []))
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('key_services')
                    ->label('Key Services')
                    ->formatStateUsing(fn($state) => implode(', ', $state ?? []))
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('benefits')
                    ->label('Benefits')
                    ->formatStateUsing(fn($state) => implode(', ', $state ?? []))
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('technologies')
                    ->label('Technologies')
                    ->formatStateUsing(fn($state) => implode(', ', $state ?? []))
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
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
            'index' => ManageServices::route('/'),
        ];
    }
}
