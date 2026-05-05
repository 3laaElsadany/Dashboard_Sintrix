<?php

namespace App\Filament\Resources\CompanyStats\Pages;

use App\Filament\Resources\CompanyStats\CompanyStatsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageCompanyStats extends ManageRecords
{
    protected static string $resource = CompanyStatsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
