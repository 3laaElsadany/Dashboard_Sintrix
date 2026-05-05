<?php

namespace App\Filament\Resources\ClientProfits;

// use App\Filament\Resources\ClientProfits\Pages\CreateClientProfit;
// use App\Filament\Resources\ClientProfits\Pages\EditClientProfit;
use App\Filament\Resources\ClientProfits\Pages\ListClientProfits;
// use App\Filament\Resources\ClientProfits\Pages\ViewClientProfit;
use App\Filament\Resources\ClientProfits\Schemas\ClientProfitForm;
// use App\Filament\Resources\ClientProfits\Schemas\ClientProfitInfolist;
use App\Filament\Resources\ClientProfits\Tables\ClientProfitsTable;
use App\Models\ClientProfit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
// use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ClientProfitResource extends Resource
{
    protected static ?string $model = ClientProfit::class;

    protected static string | UnitEnum | null $navigationGroup =  'Finance';
    protected static string|BackedEnum|null $navigationIcon =  'heroicon-o-arrow-trending-up';
    protected static ?int $navigationSort = 6;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    protected static ?string $recordTitleAttribute = 'client_name';

    public static function form(Schema $schema): Schema
    {
        return ClientProfitForm::configure($schema);
    }

    // public static function infolist(Schema $schema): Schema
    // {
    //     return ClientProfitInfolist::configure($schema);
    // }

    public static function table(Table $table): Table
    {
        return ClientProfitsTable::configure($table);
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
            'index' => ListClientProfits::route('/'),
        ];
    }
}
