<?php

namespace App\Filament\Resources\ReadyToTransformYourBusinesses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReadyToTransformYourBusinessForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->label('Customer Name'),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->label('Email Address'),
                Select::make('service_category')
                    ->options([
                        'Web Development' => 'Web Development',
                        'IT Service' => 'IT Service',
                        'Cloud Service' => 'Cloud Service',
                        'Cybersecurity' => 'Cybersecurity',
                        'Business Consulting' => 'Business Consulting',
                        'Marketing & Branding' => 'Marketing & Branding',
                        'Mobile App Development' => 'Mobile App Development'
                    ])
                    ->required()
                    ->label('Service Category'),
            ]);
    }
}
