<?php

namespace App\Filament\Resources\Paiements\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PaiementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('rituel_prescrit_id')
                    ->relationship('rituelPrescrit', 'id')
                    ->getOptionLabelFromRecordUsing(
                        fn ($record) => "{$record->dossier->client->nom} — {$record->dossier->service->nom} ({$record->montant_total} FCFA)"
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('statut')
                    ->options([
                        'en_attente' => 'En attente',
                        'valide' => 'Validé',
                    ])
                    ->default('en_attente')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (string $state, callable $set, callable $get) {
                        if ($state === 'valide' && blank($get('valide_le'))) {
                            $set('valide_le', now());
                        }
                    }),
                DateTimePicker::make('preuve_recue_le')
                    ->label('Preuve reçue le'),
                DateTimePicker::make('valide_le')
                    ->label('Validé le'),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}