<?php

namespace App\Filament\Resources\RituelPrescrits\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class RituelPrescritForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('dossier_id')
                    ->relationship('dossier', 'id')
                    ->getOptionLabelFromRecordUsing(
                        fn ($record) => "{$record->client->nom} — {$record->service->nom}"
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('langue_origine')
                    ->label("Langue d'origine")
                    ->helperText("La langue dans laquelle tu rédiges ce rituel — sera traduite automatiquement à l'envoi.")
                    ->options([
                        'fr' => 'Français',
                        'en' => 'Anglais',
                        'it' => 'Italien',
                        'de' => 'Allemand',
                        'pl' => 'Polonais',
                    ])
                    ->default('fr')
                    ->required(),
                Select::make('origine')
                    ->options([
                        'guerisseur' => 'Guérisseur',
                        'client' => 'Client',
                    ])
                    ->default('guerisseur')
                    ->required(),
                Select::make('statut')
                    ->options([
                        'en_attente_redaction' => 'En attente de rédaction',
                        'proposition_envoyee' => 'Proposition envoyée',
                        'paiement_en_attente' => 'Paiement en attente',
                        'paiement_valide' => 'Paiement validé',
                        'rituel_en_cours' => 'Rituel en cours',
                        'termine' => 'Terminé',
                    ])
                    ->default('en_attente_redaction')
                    ->required(),
                Textarea::make('notes_guerisseur')
                    ->label('Description du rituel')
                    ->columnSpanFull(),
                Textarea::make('coordonnees_paiement')
                    ->label('Coordonnées de paiement à communiquer')
                    ->columnSpanFull(),
                Repeater::make('lignesFacture')
                    ->relationship()
                    ->label('Ingrédients')
                    ->schema([
                        TextInput::make('designation')
                            ->label('Ingrédient')
                            ->required(),
                        TextInput::make('prix')
                            ->numeric()
                            ->required()
                            ->suffix('FCFA'),
                        TextInput::make('quantite')
                            ->numeric()
                            ->default(1)
                            ->required(),
                    ])
                    ->columns(3)
                    ->columnSpanFull()
                    ->addActionLabel('Ajouter un ingrédient'),
                TextInput::make('montant_total')
                    ->numeric()
                    ->default(0.0)
                    ->disabled()
                    ->dehydrated(false)
                    ->helperText('Calculé automatiquement à partir des ingrédients ci-dessus.'),
                DateTimePicker::make('envoye_le')
                    ->label('Envoyé le')
                    ->disabled(),
            ]);
    }
}