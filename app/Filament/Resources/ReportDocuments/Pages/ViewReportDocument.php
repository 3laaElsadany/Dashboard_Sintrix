<?php

namespace App\Filament\Resources\ReportDocuments\Pages;

use App\Filament\Resources\ReportDocuments\ReportDocumentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewReportDocument extends ViewRecord
{
    protected static string $resource = ReportDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
