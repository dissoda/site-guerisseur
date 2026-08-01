<?php

namespace App\Filament\Resources\MiseAJours\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class MiseAJourForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('rituel_prescrit_id')
                    ->label('Rituel concerné')
                    ->relationship('rituelPrescrit', 'id')
                    ->getOptionLabelFromRecordUsing(
                        fn ($record) => "{$record->dossier->client->nom} — {$record->dossier->service->nom}"
                    )
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('message')
                    ->label('Message pour le client')
                    ->columnSpanFull(),
                FileUpload::make('images')
                    ->label('Images')
                    ->multiple()
                    ->image()
                    ->reorderable()
                    ->directory('mises-a-jour/images'),
                FileUpload::make('videos')
                    ->label('Vidéos')
                    ->multiple()
                    ->acceptedFileTypes(['video/mp4', 'video/quicktime'])
                    ->directory('mises-a-jour/videos'),
            ]);
    }
}