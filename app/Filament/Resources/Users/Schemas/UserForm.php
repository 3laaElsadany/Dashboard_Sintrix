<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()->visible(fn($context) => in_array($context, ['create']))
                    ->required(fn($context) => $context === 'create')
                    ->dehydrated(fn($state) => filled($state)),

                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'super_admin' => 'Super Admin',
                        'project_manager' => 'Project Manager',
                        'account_manager' => 'Account Manager',
                        'marketing_executive' => 'Marketing Executive',
                        'viewer' => 'Viewer',
                        'client_service' => 'Client Service',
                    ])
                    ->required()
                    ->native(false),

                TextInput::make('position'),
                TextInput::make('department'),
            ]);
    }
}
