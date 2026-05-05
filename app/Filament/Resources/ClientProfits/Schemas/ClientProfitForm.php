<?php

namespace App\Filament\Resources\ClientProfits\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientProfitForm
{

    public static function calculateTotals($set, $get)
    {
        $revenue = (float) $get('revenue');
        $cost = (float) $get('cost');
        $profit = $revenue - $cost;

        $set('net_profit', $profit);

        if ($revenue > 0) {
            $margin = ($profit / $revenue) * 100;
            $set('margin', round($margin, 2));
        } else {
            $set('margin', 0);
        }
    }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('client_name')
                    ->required(),

                TextInput::make('projects_count')
                    ->numeric()
                    ->default(1),

                TextInput::make('revenue')
                    ->numeric()
                    ->prefix('$')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($set, $get) => self::calculateTotals($set, $get)),

                TextInput::make('cost')
                    ->numeric()
                    ->prefix('$')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn($set, $get) => self::calculateTotals($set, $get)),

                TextInput::make('net_profit')
                    ->numeric()
                    ->prefix('$')
                    ->readOnly()
                    ->extraInputAttributes(['class' => 'font-bold']),

                TextInput::make('margin')
                    ->label('Profit Margin %')
                    ->suffix('%')
                    ->readOnly(),

                FileUpload::make('img_link')
                    ->image()
                    ->label('Image')
                    ->disk('public')
                    ->directory('clients-photos')
                    ->columnSpanFull(),

            ]);
    }
}
