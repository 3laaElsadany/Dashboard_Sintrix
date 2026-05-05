<?php

namespace App\Filament\Resources\ReportDocuments\Pages;

use App\Filament\Resources\ReportDocuments\ReportDocumentResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReportDocuments extends ListRecords
{
    protected static string $resource = ReportDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
