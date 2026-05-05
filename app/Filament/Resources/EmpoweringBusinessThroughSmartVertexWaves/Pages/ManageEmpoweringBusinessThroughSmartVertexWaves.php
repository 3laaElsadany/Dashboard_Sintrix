<?php

namespace App\Filament\Resources\EmpoweringBusinessThroughSmartVertexWaves\Pages;

use App\Filament\Resources\EmpoweringBusinessThroughSmartVertexWaves\EmpoweringBusinessThroughSmartVertexWaveResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageEmpoweringBusinessThroughSmartVertexWaves extends ManageRecords
{
    protected static string $resource = EmpoweringBusinessThroughSmartVertexWaveResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
