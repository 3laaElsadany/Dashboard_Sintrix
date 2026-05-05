<?php

namespace App\Filament\Resources\HearFromOurHappyCustomers\Pages;

use App\Filament\Resources\HearFromOurHappyCustomers\HearFromOurHappyCustomerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageHearFromOurHappyCustomers extends ManageRecords
{
    protected static string $resource = HearFromOurHappyCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
