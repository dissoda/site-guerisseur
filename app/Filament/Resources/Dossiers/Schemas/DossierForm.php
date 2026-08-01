<?php

namespace App\Filament\Resources\Dossiers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DossierForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('client_id')
                    ->relationship('client', 'nom')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('service_id')
                    ->relationship('service', 'nom')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->nom)
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('description_besoin')
                    ->required()
                    ->columnSpanFull(),
                Select::make('statut')
                    ->options([
                        'nouveau' => 'Nouveau',
                        'en_cours' => 'En cours',
                        'cloture' => 'Clôturé',
                    ])
                    ->default('nouveau')
                    ->required(),
            ]);
    }
}