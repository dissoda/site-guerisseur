<?php

namespace App\Filament\Resources\MiseAJours;

use App\Filament\Resources\MiseAJours\Pages\CreateMiseAJour;
use App\Filament\Resources\MiseAJours\Pages\EditMiseAJour;
use App\Filament\Resources\MiseAJours\Pages\ListMiseAJours;
use App\Filament\Resources\MiseAJours\Schemas\MiseAJourForm;
use App\Filament\Resources\MiseAJours\Tables\MiseAJoursTable;
use App\Models\MiseAJour;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MiseAJourResource extends Resource
{
    protected static ?string $model = MiseAJour::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCamera;

    protected static ?string $recordTitleAttribute = 'message';

    public static function form(Schema $schema): Schema
    {
        return MiseAJourForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MiseAJoursTable::configure($table);
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
            'index' => ListMiseAJours::route('/'),
            'create' => CreateMiseAJour::route('/create'),
            'edit' => EditMiseAJour::route('/{record}/edit'),
        ];
    }
}
