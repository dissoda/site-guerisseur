<?php

namespace App\Filament\Resources\RituelPrescrits\Pages;

use App\Filament\Resources\RituelPrescrits\RituelPrescritResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRituelPrescrits extends ListRecords
{
    protected static string $resource = RituelPrescritResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
