<?php

namespace App\Filament\Resources\RituelPrescrits\Pages;

use App\Filament\Resources\RituelPrescrits\RituelPrescritResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRituelPrescrit extends CreateRecord
{
    protected static string $resource = RituelPrescritResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        if (request()->has('dossier_id')) {
            $data['dossier_id'] = request()->query('dossier_id');
        }

        return $data;
    }
}