<?php

namespace App\Filament\Resources\Temoignages\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TemoignagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nom')
                    ->searchable(),
                TextColumn::make('texte')
                    ->limit(60)
                    ->wrap(),
                TextColumn::make('statut')
                    ->badge(),
                TextColumn::make('created_at')
                    ->label('Soumis le')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('approuver')
                    ->label('Approuver')
                    ->icon(Heroicon::OutlinedCheck)
                    ->color('success')
                    ->visible(fn ($record) => $record->statut !== 'publie')
                    ->action(fn ($record) => $record->update(['statut' => 'publie'])),
                Action::make('refuser')
                    ->label('Refuser')
                    ->icon(Heroicon::OutlinedXMark)
                    ->color('danger')
                    ->visible(fn ($record) => $record->statut !== 'refuse')
                    ->action(fn ($record) => $record->update(['statut' => 'refuse'])),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}