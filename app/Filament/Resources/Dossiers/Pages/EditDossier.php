<?php

namespace App\Filament\Resources\Dossiers\Pages;

use App\Filament\Resources\Dossiers\DossierResource;
use App\Filament\Resources\RituelPrescrits\RituelPrescritResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Icons\Heroicon;

class EditDossier extends EditRecord
{
    protected static string $resource = DossierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('nouvelleEtape')
                ->label('Nouvelle étape')
                ->icon(Heroicon::OutlinedPlusCircle)
                ->url(fn () => RituelPrescritResource::getUrl('create', ['dossier_id' => $this->record->id])),
            DeleteAction::make(),
        ];
    }
}