<?php

namespace App\Filament\Resources\Publications\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('langue_origine')
                    ->label("Langue d'origine")
                    ->helperText("La langue dans laquelle tu écris cette publication — les 4 autres seront traduites automatiquement.")
                    ->options([
                        'fr' => 'Français',
                        'en' => 'Anglais',
                        'it' => 'Italien',
                        'de' => 'Allemand',
                        'pl' => 'Polonais',
                    ])
                    ->default('fr')
                    ->required(),
                TextInput::make('titre')
                    ->required(),
                RichEditor::make('contenu')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('images')
                    ->label('Images')
                    ->multiple()
                    ->image()
                    ->reorderable()
                    ->directory('publications/images'),
                FileUpload::make('videos')
                    ->label('Vidéos')
                    ->multiple()
                    ->acceptedFileTypes(['video/mp4', 'video/quicktime'])
                    ->directory('publications/videos'),
                Select::make('statut')
                    ->options([
                        'brouillon' => 'Brouillon',
                        'publie' => 'Publié',
                    ])
                    ->default('brouillon')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (string $state, callable $set, callable $get) {
                        if ($state === 'publie' && blank($get('publie_le'))) {
                            $set('publie_le', now());
                        }
                    }),
                DateTimePicker::make('publie_le')
                    ->label('Publié le'),
            ]);
    }
}