<?php

namespace App\Filament\Resources\Clients\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nom')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('telephone')
                    ->tel(),
                TextInput::make('pays'),
                Select::make('langue')
                    ->label('Langue')
                    ->options([
                        'fr' => 'Français',
                        'en' => 'Anglais',
                        'it' => 'Italien',
                        'de' => 'Allemand',
                        'pl' => 'Polonais',
                    ])
                    ->required()
                    ->default('fr'),
            ]);
    }
}