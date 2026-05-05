<?php

namespace App\Filament\Resources\ReadyToTransformYourBusinesses\Pages;

use App\Filament\Resources\ReadyToTransformYourBusinesses\ReadyToTransformYourBusinessResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReadyToTransformYourBusinesses extends ListRecords
{
    protected static string $resource = ReadyToTransformYourBusinessResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
