<?php

namespace App\Filament\Resources\Paiements\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaiementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rituelPrescrit.dossier.client.nom')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('rituelPrescrit.montant_total')
                    ->label('Montant')
                    ->suffix(' FCFA'),
                TextColumn::make('statut')
                    ->badge(),
                TextColumn::make('preuve_recue_le')
                    ->label('Preuve reçue le')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('valide_le')
                    ->label('Validé le')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}