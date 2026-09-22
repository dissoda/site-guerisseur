<?php

namespace App\Filament\Resources\RituelPrescrits;

use App\Filament\Resources\RituelPrescrits\Pages\CreateRituelPrescrit;
use App\Filament\Resources\RituelPrescrits\Pages\EditRituelPrescrit;
use App\Filament\Resources\RituelPrescrits\Pages\ListRituelPrescrits;
use App\Filament\Resources\RituelPrescrits\Schemas\RituelPrescritForm;
use App\Filament\Resources\RituelPrescrits\Tables\RituelPrescritsTable;
use App\Models\RituelPrescrit;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RituelPrescritResource extends Resource
{
    protected static ?string $model = RituelPrescrit::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $recordTitleAttribute = 'notes_guerisseur';

    public static function form(Schema $schema): Schema
    {
        return RituelPrescritForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RituelPrescritsTable::configure($table);
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
            'index' => ListRituelPrescrits::route('/'),
            'create' => CreateRituelPrescrit::route('/create'),
            'edit' => EditRituelPrescrit::route('/{record}/edit'),
        ];
    }
}
