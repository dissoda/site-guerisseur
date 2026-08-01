<?php

namespace App\Filament\Resources\MiseAJours\Pages;

use App\Filament\Resources\MiseAJours\MiseAJourResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMiseAJours extends ListRecords
{
    protected static string $resource = MiseAJourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
