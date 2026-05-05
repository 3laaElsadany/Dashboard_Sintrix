<?php

namespace App\Filament\Resources\ReportDocuments;

// use App\Filament\Resources\ReportDocuments\Pages\CreateReportDocument;
// use App\Filament\Resources\ReportDocuments\Pages\EditReportDocument;
use App\Filament\Resources\ReportDocuments\Pages\ListReportDocuments;
// use App\Filament\Resources\ReportDocuments\Pages\ViewReportDocument;
use App\Filament\Resources\ReportDocuments\Schemas\ReportDocumentForm;
// use App\Filament\Resources\ReportDocuments\Schemas\ReportDocumentInfolist;
use App\Filament\Resources\ReportDocuments\Tables\ReportDocumentsTable;
use App\Models\ReportDocument;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
// use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ReportDocumentResource extends Resource
{
    protected static ?string $model = ReportDocument::class;

    protected static string | UnitEnum | null $navigationGroup = 'Finance';
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-folder-arrow-down';
    protected static ?int $navigationSort = 7;

    protected static ?string $recordTitleAttribute = 'document_name';

    public static function form(Schema $schema): Schema
    {
        return ReportDocumentForm::configure($schema);
    }


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // public static function infolist(Schema $schema): Schema
    // {
    //     return ReportDocumentInfolist::configure($schema);
    // }

    public static function table(Table $table): Table
    {
        return ReportDocumentsTable::configure($table);
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
            'index' => ListReportDocuments::route('/'),
        ];
    }
}
