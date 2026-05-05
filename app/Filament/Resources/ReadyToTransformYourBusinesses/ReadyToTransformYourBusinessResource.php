<?php

namespace App\Filament\Resources\ReadyToTransformYourBusinesses;

use App\Filament\Resources\ReadyToTransformYourBusinesses\Pages\ListReadyToTransformYourBusinesses;
use App\Filament\Resources\ReadyToTransformYourBusinesses\Schemas\ReadyToTransformYourBusinessForm;
use App\Filament\Resources\ReadyToTransformYourBusinesses\Tables\ReadyToTransformYourBusinessesTable;
use App\Models\ReadyToTransformYourBusiness;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
// use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ReadyToTransformYourBusinessResource extends Resource
{
    
    protected static ?int $navigationSort = 8;
    protected static ?string $modelLabel = 'Transform Business';

    protected static ?string $pluralModelLabel = 'Transform Business';

    protected static ?string $model = ReadyToTransformYourBusiness::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-arrow-path';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ReadyToTransformYourBusinessForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReadyToTransformYourBusinessesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReadyToTransformYourBusinesses::route('/')
        ];
    }
}
