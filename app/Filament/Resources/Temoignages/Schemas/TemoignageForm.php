<?php

namespace App\Filament\Resources\Temoignages\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TemoignageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nom')
                    ->required(),
                Textarea::make('texte')
                    ->required()
                    ->columnSpanFull(),
                Select::make('statut')
                    ->options([
                        'en_attente' => 'En attente',
                        'publie' => 'Publié',
                        'refuse' => 'Refusé',
                    ])
                    ->default('en_attente')
                    ->required(),
            ]);
    }
}