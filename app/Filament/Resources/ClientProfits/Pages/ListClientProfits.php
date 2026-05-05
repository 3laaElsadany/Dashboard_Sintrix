<?php

namespace App\Filament\Resources\ClientProfits\Pages;

use App\Filament\Resources\ClientProfits\ClientProfitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClientProfits extends ListRecords
{
    protected static string $resource = ClientProfitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
