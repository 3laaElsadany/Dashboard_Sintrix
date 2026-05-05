<?php

namespace App\Filament\Resources\PortfolioProjects;

use App\Filament\Resources\PortfolioProjects\Pages\ManagePortfolioProjects;
use App\Models\PortfolioProject;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
// use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PortfolioProjectResource extends Resource
{
    protected static ?string $model = PortfolioProject::class;
 
    protected static ?int $navigationSort = 7;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-window';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Basic Information')
                ->description('Main details of the project')
                ->schema([
                    TextInput::make('title')->required()->maxLength(255)->required(),
                    TextInput::make('background_image')->required()->url(),
                    Select::make('project_type')
                        ->options([
                            'Design' => 'Design',
                            'Marketing' => 'Marketing',
                            'Development' => 'Development',
                        ])->required()->native(false),
                    TextInput::make('client')->required(),
                    DatePicker::make('date')
                        ->label('Project Date')
                        ->native(false)
                        ->required(),
                    Textarea::make('description')->required()->columnSpanFull()->required(),
                ])->columns(2),

            Section::make('Technical & Media')
                ->schema([
                    TagsInput::make('technologies_used')
                        ->placeholder('Add Tech...')
                        ->columnSpanFull()->required(),

                    Repeater::make('project_gallery')
                        ->label('Project Links / Gallery')
                        ->schema([
                            TextInput::make('url')->url()->required()->placeholder('https://...')->required(),
                        ])->columns(2)->columnSpanFull()
                        ->reorderableWithButtons()
                        ->itemLabel(fn(array $state): ?string => $state['label'] ?? null),
                ]),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {

        return $schema
            ->components([

                TextEntry::make('title')->columns(1),
                TextEntry::make('project_type')->badge()->columns(1),
                TextEntry::make('client')->columns(1),
                TextEntry::make('date')->date()->columns(1),
                TextEntry::make('background_image')->columns(2),
                TextEntry::make('description')->columnSpanFull()->columns(2),

                TextEntry::make('technologies_used')
                    ->badge()
                    ->separator(',')->columns(2),

                RepeatableEntry::make('project_gallery')
                    ->label('Project Gallery')
                    ->schema([
                        TextEntry::make('url')
                            ->label('Link')
                            ->url(fn($state): string => $state)
                            ->openUrlInNewTab(),
                    ])
                    ->columnSpanFull(),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('project_type')->badge()->sortable()->searchable(),
                TextColumn::make('background_image')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('client')->searchable()->toggleable(),
                TextColumn::make('date')->date()->sortable()->toggleable(),
                TextColumn::make('description')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('technologies_used')->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('project_gallery')->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManagePortfolioProjects::route('/'),
        ];
    }
}
