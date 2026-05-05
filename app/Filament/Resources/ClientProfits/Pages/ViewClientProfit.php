<?php

namespace App\Filament\Resources\ClientProfits\Pages;

use App\Filament\Resources\ClientProfits\ClientProfitResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClientProfit extends ViewRecord
{
    protected static string $resource = ClientProfitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
