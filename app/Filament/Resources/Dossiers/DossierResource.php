<?php

namespace App\Filament\Resources\Dossiers;

use App\Filament\Resources\Dossiers\Pages\CreateDossier;
use App\Filament\Resources\Dossiers\Pages\EditDossier;
use App\Filament\Resources\Dossiers\Pages\ListDossiers;
use App\Filament\Resources\Dossiers\Schemas\DossierForm;
use App\Filament\Resources\Dossiers\Tables\DossiersTable;
use App\Models\Dossier;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DossierResource extends Resource
{
    protected static ?string $model = Dossier::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolderOpen;

    protected static ?string $recordTitleAttribute = 'description_besoin';

    public static function form(Schema $schema): Schema
    {
        return DossierForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DossiersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDossiers::route('/'),
            'create' => CreateDossier::route('/create'),
            'edit' => EditDossier::route('/{record}/edit'),
        ];
    }
}
