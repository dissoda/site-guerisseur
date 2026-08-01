<?php

namespace App\Filament\Resources\MiseAJours\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MiseAJoursTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('rituelPrescrit.dossier.client.nom')
                    ->label('Client')
                    ->searchable(),
                TextColumn::make('message')
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('envoyee_le')
                    ->label('Envoyée le')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('Pas encore envoyée'),
                TextColumn::make('created_at')
                    ->label('Créée le')
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