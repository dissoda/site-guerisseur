<?php

namespace App\Filament\Resources\RituelPrescrits\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RituelPrescritsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('dossier.client.nom')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('dossier.service.nom')
                    ->label('Service')
                    ->searchable(),
                TextColumn::make('origine')
                    ->badge(),
                TextColumn::make('statut')
                    ->badge(),
                TextColumn::make('montant_total')
                    ->label('Total')
                    ->numeric()
                    ->sortable()
                    ->suffix(' FCFA'),
                TextColumn::make('envoye_le')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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