<?php

namespace App\Filament\Resources\Publications\Pages;

use App\Filament\Resources\Publications\PublicationResource;
use App\Services\Traducteur;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use LaraZeus\SpatieTranslatable\Actions\LocaleSwitcher;
use LaraZeus\SpatieTranslatable\Resources\Pages\EditRecord\Concerns\Translatable;

class EditPublication extends EditRecord
{
    use Translatable;

    protected static string $resource = PublicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        app(Traducteur::class)->traduireChampsManquants(
            $this->record,
            ['titre', 'contenu'],
            $this->record->langue_origine,
        );
    }
}