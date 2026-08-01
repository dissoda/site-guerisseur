<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('langue_origine')
                    ->label("Langue d'origine")
                    ->helperText("La langue dans laquelle tu écris ce service — les 4 autres seront traduites automatiquement.")
                    ->options([
                        'fr' => 'Français',
                        'en' => 'Anglais',
                        'it' => 'Italien',
                        'de' => 'Allemand',
                        'pl' => 'Polonais',
                    ])
                    ->default('fr')
                    ->required(),
                TextInput::make('nom')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, callable $set) {
                        if ($operation === 'create') {
                            $set('slug', Str::slug($state));
                        }
                    }),
                TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->rows(4),
                Toggle::make('actif')
                    ->required(),
            ]);
    }
}