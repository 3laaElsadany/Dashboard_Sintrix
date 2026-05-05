<?php

namespace App\Filament\Resources\ReportDocuments\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ReportDocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('document_name')
                    ->required(),

                Select::make('document_type')
                    ->options([
                        'report' => 'Report',
                        'excel' => 'Excel',
                        'pdf' => 'PDF',
                        'Document' => 'DOCUMENT',
                    ])
                    ->required()
                    ->native(false),

                FileUpload::make('file_path')
                    ->label('Document')
                    ->disk('public')
                    ->directory('finance-documents')
                    ->required()
                    ->live()
                    // التعديل هنا: نتحقق إن الـ state هو كائن ملف قبل حساب الحجم
                    ->afterStateUpdated(function ($state, $set) {
                        if ($state instanceof TemporaryUploadedFile) {
                            $sizeInBytes = $state->getSize();
                            $sizeInKb = round($sizeInBytes / 1024, 2) . ' KB';
                            $set('file_size', $sizeInKb);
                        }
                    }), 

                // حقل مخفي أو قراءة فقط لتخزين الحجم
                TextInput::make('file_size')
                    ->label('File Size')
                    ->readOnly()
                    ->placeholder('Auto-calculated'),
            ]);
    }
}
